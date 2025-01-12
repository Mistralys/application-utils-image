<?php
/**
 * @package ImageHelper
 * @subpackage Image Files
 */

declare(strict_types=1);

namespace AppUtils\ImageHelper\ImageFiles\FileTypes;

use AppUtils\ImageHelper\ImageFiles\BaseVectorImageFile;
use AppUtils\ImageHelper\ImageFormats\Formats\SVGImage;

/**
 * SVG image file class.
 *
 *  Instantiate via {@see self::factory()} or {@see FileInfo::factory()}.
 *
 * @package ImageHelper
 * @subpackage Image Files
 */
class SVGFile extends BaseVectorImageFile
{
    public const EXTENSION = 'svg';

    protected function getFormatID(): string
    {
        return SVGImage::FORMAT_ID;
    }
}
