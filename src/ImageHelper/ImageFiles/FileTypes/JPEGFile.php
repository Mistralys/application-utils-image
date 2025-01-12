<?php
/**
 * @package ImageHelper
 * @subpackage Image Files
 */

declare(strict_types=1);

namespace AppUtils\ImageHelper\ImageFiles\FileTypes;

use AppUtils\ClassHelper;
use AppUtils\ImageHelper\ImageFiles\BaseBitmapImageFile;
use AppUtils\ImageHelper\ImageFormats\Formats\JPEGImage;

/**
 * JPEG image file class.
 *
 * Instantiate via {@see self::factory()} or {@see FileInfo::factory()}.
 *
 * @package ImageHelper
 * @subpackage Image Files
 */
class JPEGFile extends BaseBitmapImageFile
{
    public const EXTENSION = 'jpeg';

    public function getFormatID() : string
    {
        return JPEGImage::FORMAT_ID;
    }

    public static function factory($path) : JPEGFile
    {
        return ClassHelper::requireObjectInstanceOf(
            self::class,
            self::createInstance($path)
        );
    }
}