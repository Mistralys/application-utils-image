<?php
/**
 * @package Image Helper
 * @subpackage Image Formats
 */

declare(strict_types=1);

namespace AppUtils\ImageHelper\ImageFormats\Formats;

use AppUtils\ImageHelper\ImageFormats\BaseImageFormat;

/**
 * The SVG image format.
 *
 * @package Image Helper
 * @subpackage Image Formats
 */
class SVGImage extends BaseImageFormat
{
    public const FORMAT_ID = 'svg';

    public function getID(): string
    {
        return self::FORMAT_ID;
    }

    public function getExtensions() : array
    {
        return array('svg');
    }

    public function isStreamable() : bool
    {
        return false;
    }

    public function isVector() : bool
    {
        return true;
    }

    public function isAnimatable(): bool
    {
        return false;
    }

    public function getGDImageType(): ?string
    {
        return null;
    }
}
