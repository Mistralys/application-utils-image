<?php
/**
 * @package Image Helper
 * @subpackage Image Formats
 */

declare(strict_types=1);

namespace AppUtils\ImageHelper\ImageFormats\Formats;

use AppUtils\FileHelper\FileInfo;
use AppUtils\ImageHelper\ImageFormats\BaseBitmapFormat;

/**
 * The GIF image format.
 *
 * @package Image Helper
 * @subpackage Image Formats
 */
class GIFImage extends BaseBitmapFormat
{
    public const FORMAT_ID = 'gif';

    public function getID(): string
    {
        return self::FORMAT_ID;
    }

    public function getExtensions(): array
    {
        return array('gif');
    }

    public function isAnimatable() : bool
    {
        return true;
    }

    public function getGDImageType(): string
    {
        return 'gif';
    }

    public function fileHasAnimation(FileInfo $filename) : bool
    {
        $fh = @fopen((string)$filename, 'rb');

        if($fh === false) {
            return false;
        }

        $count = 0;
        // an animated GIF contains multiple "frames", with each frame having a
        // header made up of:
        // * a static 4-byte sequence (\x00\x21\xF9\x04)
        // * 4 variable bytes
        // * a static 2-byte sequence (\x00\x2C)

        // We read through the file til we reach the end of the file, or we've found
        // at least 2 frame headers
        while(!feof($fh) && $count < 2) {
            $chunk = fread($fh, 1024 * 100); //read 100 kb at a time
            $count += preg_match_all('#\x00?\x21\xF9\x04.{4}\x00[\x2C\x21]#s', $chunk);
        }

        fclose($fh);
        return $count > 1;
    }
}
