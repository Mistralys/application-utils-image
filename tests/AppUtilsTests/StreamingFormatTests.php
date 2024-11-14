<?php

declare(strict_types=1);

namespace AppUtilsTests;

use AppUtils\ImageHelper;
use PHPUnit\Framework\TestCase;

final class StreamingFormatTests extends TestCase
{
    public function test_requireValidStreamingType() : void
    {
        ImageHelper::requireValidStreamType('jpeg');
        ImageHelper::requireValidStreamType('jpg');
        ImageHelper::requireValidStreamType('png');
        ImageHelper::requireValidStreamType('gif');

        $this->addToAssertionCount(4);
    }

    public function test_invalidStreamTypeSVG() : void
    {
        $this->expectExceptionCode(ImageHelper::ERROR_INVALID_STREAM_IMAGE_TYPE);

        ImageHelper::requireValidStreamType('svg');
    }

    public function test_invalidSteamTypeUnknown() : void
    {
        $this->expectExceptionCode(ImageHelper::ERROR_INVALID_STREAM_IMAGE_TYPE);

        ImageHelper::requireValidStreamType('unknown');
    }
}
