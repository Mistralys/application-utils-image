<?php
/**
 * @package Image Helper
 * @subpackage Image Formats
 */

declare(strict_types=1);

namespace AppUtils\ImageHelper\ImageFormats\Formats;

use AppUtils\ImageHelper\ImageFormats\BaseBitmapFormat;

/**
 * The JPEG image format.
 *
 * @package Image Helper
 * @subpackage Image Formats
 */
class JPEGImage extends BaseBitmapFormat
{
    public const FORMAT_ID = 'jpeg';

    public function getID(): string
    {
        return self::FORMAT_ID;
    }

    public function getExtensions() : array
    {
        return array('jpg', 'jpeg');
    }

    public function isAnimatable(): bool
    {
        return false;
    }

    public function getGDImageType(): string
    {
        return 'jpeg';
    }
}
