<?php
/**
 * @package ImageHelper
 * @subpackage Image Files
 */

declare(strict_types=1);

namespace AppUtils\ImageHelper\ImageFiles;

use AppUtils\ClassHelper\BaseClassHelperException;
use AppUtils\FileHelper\FileInfo;
use AppUtils\ImageHelper;
use AppUtils\ImageHelper\ImageFormats\FormatsCollection;
use AppUtils\ImageHelper\ImageFormats\ImageFormatInterface;
use AppUtils\ImageHelper_Exception;
use AppUtils\ImageHelper_Size;

/**
 * Base class for all supported image files.
 *
 * @package ImageHelper
 * @subpackage Image Files
 */
abstract class BaseImageFile extends FileInfo implements ImageFileInterface
{
    public function createImageHelper() : ImageHelper
    {
        return ImageHelper::createFromFile($this);
    }

    public function getID() : string
    {
        return self::EXTENSION;
    }

    private ?ImageHelper_Size $size = null;

    /**
     * Gets the dimensions of the image.
     *
     * @cached This is cached internally.
     * @return ImageHelper_Size
     * @throws BaseClassHelperException
     * @throws ImageHelper_Exception
     */
    public function getImageSize() : ImageHelper_Size
    {
        if(!isset($this->size)) {
            $this->size = ImageHelper::getImageSize($this->getPath());
        }

        return $this->size;
    }

    private ?ImageFormatInterface $format = null;

    public function getImageFormat() : ImageFormatInterface
    {
        if(!isset($this->format)) {
            $this->format = FormatsCollection::getInstance()->getByID($this->getFormatID());
        }

        return $this->format;
    }

    /**
     * @return string
     */
    abstract protected function getFormatID() : string;

    public function isVector() : bool
    {
        return $this->getImageFormat()->isVector();
    }

    public function isStreamable() : bool
    {
        return $this->getImageFormat()->isStreamable();
    }

    public function isAnimatable() : bool
    {
        return $this->getImageFormat()->isAnimatable();
    }

    public function getGDImageType() : string
    {
        return $this->getImageFormat()->getGDImageType();
    }

    public function getExtensions() : array
    {
        return $this->getImageFormat()->getExtensions();
    }

    public function displayImage() : void
    {
        ImageHelper::displayImage($this->getPath());
    }
}
