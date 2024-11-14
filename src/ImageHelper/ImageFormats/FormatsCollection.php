<?php
/**
 * @package Image Helper
 * @subpackage Image Formats
 */

declare(strict_types=1);

namespace AppUtils\ImageHelper\ImageFormats;

use AppUtils\ClassHelper;
use AppUtils\Collections\BaseStringPrimaryCollection;
use AppUtils\ImageHelper;
use AppUtils\ImageHelper\ImageFormats\Formats\GIFImage;
use AppUtils\ImageHelper\ImageFormats\Formats\JPEGImage;
use AppUtils\ImageHelper\ImageFormats\Formats\PNGImage;
use AppUtils\ImageHelper\ImageFormats\Formats\SVGImage;
use AppUtils\ImageHelper_Exception;

/**
 * Utility class to access the available image formats.
 *
 * ## Usage
 *
 * To create/get an instance, use {@see self::getInstance()}.
 *
 * @package Image Helper
 * @subpackage Image Formats
 *
 * @method ImageFormatInterface getByID(string $id)
 * @method ImageFormatInterface getDefault()
 * @method ImageFormatInterface[] getAll()
 */
class FormatsCollection extends BaseStringPrimaryCollection
{
    private static ?self $instance = null;

    public static function getInstance() : self
    {
        if(!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getDefaultID(): string
    {
        return JPEGImage::FORMAT_ID;
    }

    protected function registerItems(): void
    {
        $this->registerItem(new JPEGImage());
        $this->registerItem(new PNGImage());
        $this->registerItem(new SVGImage());
        $this->registerItem(new GIFImage());
    }

    /**
     * @var string[]|null
     */
    private ?array $extensions = null;

    /**
     * Returns all known image file extensions, without a leading dot.
     * @return string[]
     */
    public function getExtensions() : array
    {
        if(isset($this->extensions)) {
            return $this->extensions;
        }

        $result = array();

        foreach($this->getAll() as $format)
        {
            array_push($result, ...$format->getExtensions());
        }

        sort($result);

        $this->extensions = $result;

        return $result;
    }

    public function extensionExists(string $extension) : bool
    {
        return in_array(strtolower($extension), $this->getExtensions());
    }

    /**
     * @param string $extension
     * @return ImageFormatInterface
     * @throws ImageHelper_Exception
     */
    public function getByExtension(string $extension) : ImageFormatInterface
    {
        $extension = strtolower($extension);

        foreach($this->getAll() as $format) {
            if(in_array($extension, $format->getExtensions())) {
                return $format;
            }
        }

        throw new ImageHelper_Exception(
            'Unknown image format extension.',
            sprintf(
                'The image extension [%s] does not correspond to any known image format. '.PHP_EOL.
                'Known extensions are: '.PHP_EOL.
                '- %s',
                $extension,
                implode(PHP_EOL.'- ', $this->getExtensions())
            ),
            ImageHelper::ERROR_UNKNOWN_IMAGE_EXTENSION
        );
    }

    public function findByIDOrExtension(string $idOrExtension) : ?ImageFormatInterface
    {
        if($this->idExists($idOrExtension)) {
            return $this->getByID($idOrExtension);
        }

        if($this->extensionExists($idOrExtension)) {
            return $this->getByExtension($idOrExtension);
        }

        return null;
    }

    public function getJPGFormat() : JPEGImage
    {
        return ClassHelper::requireObjectInstanceOf(
            JPEGImage::class,
            $this->getByID(JPEGImage::FORMAT_ID)
        );
    }

    public function getPNGFormat() : PNGImage
    {
        return ClassHelper::requireObjectInstanceOf(
            PNGImage::class,
            $this->getByID(PNGImage::FORMAT_ID)
        );
    }

    public function getSVGFormat() : SVGImage
    {
        return ClassHelper::requireObjectInstanceOf(
            SVGImage::class,
            $this->getByID(SVGImage::FORMAT_ID)
        );
    }

    public function getGIFFormat() : GIFImage
    {
        return ClassHelper::requireObjectInstanceOf(
            GIFImage::class,
            $this->getByID(GIFImage::FORMAT_ID)
        );
    }
}
