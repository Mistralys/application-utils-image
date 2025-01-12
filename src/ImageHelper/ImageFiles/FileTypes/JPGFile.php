<?php
/**
 * @package ImageHelper
 * @subpackage Image Files
 */

declare(strict_types=1);

namespace AppUtils\ImageHelper\ImageFiles\FileTypes;

use AppUtils\ClassHelper;

/**
 * JPG image file class.
 *
 * Instantiate via {@see self::factory()} or {@see FileInfo::factory()}.
 *
 * > NOTE: Functionally the same as {@see JPEGFile}.
 * > The only difference is that the `JPG` extension
 * > is used instead of `JPEG`.
 *
 * @package ImageHelper
 * @subpackage Image Files
 */
class JPGFile extends JPEGFile
{
    public const EXTENSION = 'jpg';

    public static function factory($path) : JPEGFile
    {
        return ClassHelper::requireObjectInstanceOf(
            self::class,
            self::createInstance($path)
        );
    }
}
