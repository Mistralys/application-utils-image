<?php
/**
 * @package ImageHelper
 * @subpackage Image Files
 */

declare(strict_types=1);

namespace AppUtils\ImageHelper\ImageFiles;

use AppUtils\FileHelper\FileInfoInterface;
use AppUtils\ImageHelper;
use AppUtils\ImageHelper\ImageFormats\ImageFormatInterface;

/**
 * Interface for image files.
 *
 * @package ImageHelper
 * @subpackage Image Files
 */
interface ImageFileInterface extends ImageFormatInterface, FileInfoInterface
{
    public const EXTENSION = '';

    /**
     * Creates an image helper instance for the image file.
     * @return ImageHelper
     */
    public function createImageHelper() : ImageHelper;
}
