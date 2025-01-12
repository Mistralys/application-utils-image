<?php
/**
 * @package ImageHelper
 * @subpackage Image Files
 */

declare(strict_types=1);

namespace AppUtils\ImageHelper\ImageFiles\FileTypes;

use AppUtils\ClassHelper;
use AppUtils\FileHelper\FileInfo;
use AppUtils\ImageHelper\ImageFiles\BaseBitmapImageFile;
use AppUtils\ImageHelper\ImageFormats\Formats\PNGImage;

/**
 * PNG image file class.
 *
 * Instantiate via {@see self::factory()} or {@see FileInfo::factory()}.
 *
 * @package ImageHelper
 * @subpackage Image Files
 */
class PNGFile extends BaseBitmapImageFile
{
    public const EXTENSION = 'png';

    public function getFormatID() : string
    {
        return PNGImage::FORMAT_ID;
    }

    public static function factory($path) : PNGFile
    {
        return ClassHelper::requireObjectInstanceOf(
            self::class,
            self::createInstance($path)
        );
    }
}
