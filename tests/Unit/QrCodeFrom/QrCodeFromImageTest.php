<?php

declare(strict_types=1);

namespace Tests\Unit\QrCodeFrom;

use PHPUnit\Framework\TestCase;
use Ms\QrCode\QrCodeFrom\QrCodeFromImage;
use Ms\QrCode\File\Image;
use Ms\QrCode\QrCodeRender\QrCodeRenderWithPython;

class QrCodeFromImageTest extends TestCase
{
    private $imageOneQrCode;

    public function __construct(string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->imageOneQrCode = 't=20201221T0905&s=270.00&fn=9282440300853009&i=2353&fp=2862508635&n=1';
    }

    public function testSuccess()
    {
        $image = __DIR__ . "/../../files/qrcodes_images/imageOne.png";

        $resultQrCode = (
            new QrCodeFromImage(
                new Image($image),
                new QrCodeRenderWithPython()
            )
        )
            ->value();

        $this->assertSame($this->imageOneQrCode, $resultQrCode);
    }

    public function testFail()
    {
        $image = __DIR__ . "/../../files/qrcodes_images/imageTwo.png";

        $resultQrCode = (
            new QrCodeFromImage(
                new Image($image),
                new QrCodeRenderWithPython()
            )
        )
            ->value();

        $this->assertNotSame($this->imageOneQrCode, $resultQrCode);
    }

    public function testImageWithoutQrCode()
    {
        $image = __DIR__ . '/../../files/qrcodes_images/imageWithoutQrCode.jpg';

        $this->expectException(\Exception::class);
        $this->expectErrorMessage('Original system could not scan Qr-code.');

        (
            new QrCodeFromImage(
                new Image($image),
                new QrCodeRenderWithPython()
            )
        )
            ->value();
    }
}
