<?php
/**
 * @package Image Helper
 * @subpackage Image Formats
 */

declare(strict_types=1);

namespace AppUtils\ImageHelper\ImageFormats;

use AppUtils\Interfaces\StringPrimaryRecordInterface;

/**
 * Interface for image formats.
 *
 * A base implementation is provided by {@see BaseImageFormat}
 * or {@see BaseBitmapFormat}.
 *
 * @package Image Helper
 * @subpackage Image Formats
 */
interface ImageFormatInterface extends StringPrimaryRecordInterface
{
    public function isStreamable() : bool;
    public function isVector() : bool;

    /**
     * Whether this format supports animations.
     * @return bool
     */
    public function isAnimatable() : bool;

    /**
     * @return string[] Lowercase extensions without leading dot.
     */
    public function getExtensions() : array;

    /**
     * @return string|NULL Image type used with GD functions, or `NULL` if not supported.
     */
    public function getGDImageType() : ?string;
}
