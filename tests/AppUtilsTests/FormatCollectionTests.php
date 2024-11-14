<?php

declare(strict_types=1);

namespace AppUtilsTests;

use AppUtils\ImageHelper;
use AppUtils\ImageHelper\ImageFormats\Formats\GIFImage;
use AppUtils\ImageHelper\ImageFormats\Formats\JPEGImage;
use AppUtils\ImageHelper\ImageFormats\Formats\PNGImage;
use AppUtils\ImageHelper\ImageFormats\Formats\SVGImage;
use AppUtils\ImageHelper\ImageFormats\FormatsCollection;
use PHPUnit\Framework\TestCase;

final class FormatCollectionTests extends TestCase
{
    public function test_getAll() : void
    {
        $formats = FormatsCollection::getInstance()->getAll();
        $this->assertCount(4, $formats);
    }

    public function test_getByExtension() : void
    {
        $collection = FormatsCollection::getInstance();

        $this->assertInstanceOf(JPEGImage::class, $collection->getByExtension('jpg'));
        $this->assertInstanceOf(JPEGImage::class, $collection->getByExtension('jpeg'));
        $this->assertInstanceOf(PNGImage::class, $collection->getByExtension('png'));
        $this->assertInstanceOf(SVGImage::class, $collection->getByExtension('svg'));
        $this->assertInstanceOf(GIFImage::class, $collection->getByExtension('gif'));
    }

    public function test_getUnknownExtension() : void
    {
        $collection = FormatsCollection::getInstance();

        $this->expectExceptionCode(ImageHelper::ERROR_UNKNOWN_IMAGE_EXTENSION);

        $collection->getByExtension('unknown');
    }

    public function test_isExtensionKnown() : void
    {
        $collection = FormatsCollection::getInstance();

        $this->assertTrue($collection->extensionExists('jpg'));
        $this->assertTrue($collection->extensionExists('jpeg'));
        $this->assertTrue($collection->extensionExists('png'));
        $this->assertTrue($collection->extensionExists('svg'));
        $this->assertTrue($collection->extensionExists('gif'));
    }
}
