<?php
/**
 * @package ImageHelper
 * @subpackage Image Files
 */

declare(strict_types=1);

namespace ImageHelper\ImageFiles\FileTypes;

use AppUtils\ClassHelper;
use AppUtils\ImageHelper\ImageFiles\BaseImageFile;
use AppUtils\ImageHelper\ImageFormats\Formats\GIFImage;
use AppUtils\ImageHelper\ImageFormats\FormatsCollection;

/**
 * GIF image file class.
 *
 * Instantiate via {@see self::factory()} or {@see FileInfo::factory()}.
 *
 * @package ImageHelper
 * @subpackage Image Files
 */
class GIFFile extends BaseImageFile
{
    public const EXTENSION = 'gif';

    protected function getFormatID(): string
    {
        return GIFImage::FORMAT_ID;
    }

    public static function factory($path) : GIFFile
    {
        return ClassHelper::requireObjectInstanceOf(
            self::class,
            self::createInstance($path)
        );
    }

    /**
     * Whether the GIF file is animated.
     * @return bool
     */
    public function hasAnimation() : bool
    {
        return FormatsCollection::getInstance()
            ->getGIFFormat()
            ->fileHasAnimation($this);
    }

    /**
     * Alias method for {@see self::hasAnimation()}.
     * @return bool
     */
    public function isAnimated() : bool
    {
        return $this->hasAnimation();
    }
}
