<?php

declare(strict_types=1);

namespace AppUtilsTests;

use AppUtils\ImageHelper;
use AppUtils\ImageHelper\ImageFormats\Formats\JPEGImage;
use PHPUnit\Framework\TestCase;

final class ImageTypeTests extends TestCase
{
    public function test_getImageType() : void
    {
        $this->assertSame('jpeg', ImageHelper::getImageType('jpeg'));
        $this->assertSame('jpeg', ImageHelper::getImageType('jpg'));
        $this->assertSame('png', ImageHelper::getImageType('png'));
        $this->assertSame('svg', ImageHelper::getImageType('svg'));
        $this->assertSame('gif', ImageHelper::getImageType('gif'));
    }

    public function test_getUnknownImageType() : void
    {
        $this->assertNull(ImageHelper::getImageType('unknown'));
    }

    public function test_getImageTypes() : void
    {
        $this->assertSame(
            array(
                'gif',
                'jpeg',
                'png',
                'svg'
            ),
            ImageHelper::getImageTypes()
        );
    }

    public function test_loadedImageTypes() : void
    {
        $this->assertTrue(ImageHelper::createFromFile(__DIR__ . '/../assets/ImageHelper/test-image.jpg')->isTypeJPEG());
        $this->assertTrue(ImageHelper::createFromFile(__DIR__ . '/../assets/ImageHelper/test-image-24-bit.png')->isTypePNG());
        $this->assertTrue(ImageHelper::createFromFile(__DIR__ . '/../assets/ImageHelper/test-image.svg')->isTypeSVG());
        $this->assertTrue(ImageHelper::createFromFile(__DIR__ . '/../assets/ImageHelper/test-image-gif-16-colors.gif')->isTypeGIF());
    }

    public function test_getFormat() : void
    {
        $helper = ImageHelper::createFromFile(__DIR__ . '/../assets/ImageHelper/test-image.jpg');
        $format = $helper->getImageFormat();

        $this->assertInstanceOf(JPEGImage::class, $format);
    }
}