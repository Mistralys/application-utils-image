<?php
/**
 * @package ImageHelper
 */

declare(strict_types=1);

namespace AppUtils;

use AppUtils\ClassHelper\ClassNotExistsException;
use AppUtils\ClassHelper\ClassNotImplementsException;
use AppUtils\FileHelper\FileInfo\ExtensionClassRegistry;
use AppUtils\FileHelper\FileInfo\FileInfoException;
use AppUtils\ImageHelper\ImageFiles\FileTypes\JPEGFile;
use AppUtils\ImageHelper\ImageFiles\FileTypes\JPGFile;
use AppUtils\ImageHelper\ImageFiles\FileTypes\PNGFile;
use AppUtils\ImageHelper\ImageFiles\FileTypes\SVGFile;

registerFileTypes();

/**
 * Registers the custom image file classes in the
 * {@see ExtensionClassRegistry}.
 *
 * @return void
 * @throws ClassNotExistsException
 * @throws ClassNotImplementsException
 * @throws FileInfoException
 */
function registerFileTypes() : void
{
    ExtensionClassRegistry::registerExtensionClass(PNGFile::EXTENSION, PNGFile::class);
    ExtensionClassRegistry::registerExtensionClass(JPGFile::EXTENSION, JPGFile::class);
    ExtensionClassRegistry::registerExtensionClass(JPEGFile::EXTENSION, JPEGFile::class);
    ExtensionClassRegistry::registerExtensionClass(SVGFile::EXTENSION, SVGFile::class);
}
