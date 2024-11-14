<?php
/**
 * @package Image Helper
 * @subpackage Image Formats
 */

declare(strict_types=1);

namespace AppUtils\ImageHelper\ImageFormats;

/**
 * Abstract base class for bitmap image formats.
 *
 * @package Image Helper
 * @subpackage Image Formats
 */
abstract class BaseBitmapFormat extends BaseImageFormat
{
    public function isStreamable() : bool
    {
        return true;
    }

    public function isVector() : bool
    {
        return false;
    }
}
