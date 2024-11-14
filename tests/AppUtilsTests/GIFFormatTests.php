<?php

declare(strict_types=1);

namespace AppUtilsTests;

use AppUtils\FileHelper\FileInfo;
use AppUtils\ImageHelper\ImageFormats\FormatsCollection;
use PHPUnit\Framework\TestCase;

final class GIFFormatTests extends TestCase
{
    private const TEST_FILE_ANIMATED = __DIR__ . '/../assets/ImageHelper/test-image-gif-animated.gif';
    private const TEST_FILE_16_COLORS = __DIR__ . '/../assets/ImageHelper/test-image-gif-16-colors.gif';

    public function test_isAnimatedFile() : void
    {
        $format = FormatsCollection::getInstance()->getGIFFormat();

        $this->assertFalse($format->fileHasAnimation(FileInfo::factory(self::TEST_FILE_16_COLORS)));
        $this->assertTrue($format->fileHasAnimation(FileInfo::factory(self::TEST_FILE_ANIMATED)));
    }
}
