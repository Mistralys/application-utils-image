<?php
/**
 * @package ImageHelper
 * @subpackage Image Files
 */

declare(strict_types=1);

namespace AppUtils\ImageHelper\ImageFiles;

use AppUtils\FileHelper\FileInfo;
use SplFileInfo;

/**
 * Interface for bitmap image files.
 * The base implementation is available in {@see BaseBitmapImageFile}.
 *
 * @package ImageHelper
 * @subpackage Image Files
 */
interface BitmapImageFileInterface extends ImageFileInterface
{
    /**
     * @param string|FileInfo|SplFileInfo $outputFile
     * @param int|null $width
     * @param int|null $height
     * @return BitmapImageFileInterface
     */
    public function resample($outputFile, ?int $width, ?int $height) : BitmapImageFileInterface;

    /**
     * @param string|FileInfo|SplFileInfo $outputFile
     * @param int $width
     * @return BitmapImageFileInterface
     */
    public function resampleByWidth($outputFile, int $width) : BitmapImageFileInterface;

    /**
     * @param string|FileInfo|SplFileInfo $outputFile
     * @param int $height
     * @return BitmapImageFileInterface
     */
    public function resampleByHeight($outputFile, int $height) : BitmapImageFileInterface;
}
