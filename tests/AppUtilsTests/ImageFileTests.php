<?php

declare(strict_types=1);

namespace AppUtilsTests;

use AppUtils\FileHelper\FileInfo;
use AppUtils\ImageHelper\ImageFiles\FileTypes\JPEGFile;
use AppUtils\ImageHelper\ImageFiles\FileTypes\JPGFile;
use AppUtils\ImageHelper\ImageFiles\FileTypes\PNGFile;
use AppUtils\ImageHelper\ImageFiles\FileTypes\SVGFile;
use AppUtilsTestClasses\ImageHelperTestCase;

final class ImageFileTests extends ImageHelperTestCase
{
    public function test_PNGFile() : void
    {
        $this->assertInstanceOf(PNGFile::class, FileInfo::factory('test.png'));
    }

    public function test_JPGFile() : void
    {
        $this->assertInstanceOf(JPGFile::class, FileInfo::factory('test.jpg'));
    }

    public function test_JPEGFile() : void
    {
        $this->assertInstanceOf(JPEGFile::class, FileInfo::factory('test.jpeg'));
    }

    public function test_SVGFile() : void
    {
        $this->assertInstanceOf(SVGFile::class, FileInfo::factory('test.svg'));
    }
}
