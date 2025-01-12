<?php
/**
 * @package ImageHelper
 * @subpackage Image Files
 */

declare(strict_types=1);

namespace AppUtils\ImageHelper\ImageFiles;

use AppUtils\ClassHelper;
use AppUtils\FileHelper\FileInfo;
use AppUtils\ImageHelper;

/**
 * Base class for bitmap image files.
 *
 * @package ImageHelper
 * @subpackage Image Files
 */
abstract class BaseBitmapImageFile extends BaseImageFile implements BitmapImageFileInterface
{
    public function resample($outputFile, ?int $width, ?int $height) : BitmapImageFileInterface
    {
        return $this->saveHelperAsBitmap(
            $this->createImageHelper()->resample($width, $height),
            $outputFile
        );
    }

    public function resampleByWidth($outputFile, int $width) : BitmapImageFileInterface
    {
        return $this->saveHelperAsBitmap(
            $this->createImageHelper()->resampleByWidth($width),
            $outputFile
        );
    }

    public function resampleByHeight($outputFile, int $height) : BitmapImageFileInterface
    {
        return $this->saveHelperAsBitmap(
            $this->createImageHelper()->resampleByHeight($height),
            $outputFile
        );
    }

    private function saveHelperAsBitmap(ImageHelper $helper, $outputFile) : BitmapImageFileInterface
    {
        $helper->save((string)$outputFile);

        return ClassHelper::requireObjectInstanceOf(
            BitmapImageFileInterface::class,
            FileInfo::factory($outputFile)
        );
    }
}
