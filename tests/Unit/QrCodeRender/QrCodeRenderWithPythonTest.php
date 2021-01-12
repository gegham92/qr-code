<?php

declare(strict_types=1);

namespace Tests\Unit\QrCodeRender;

use PHPUnit\Framework\TestCase;
use Ms\QrCode\QrCodeRender\QrCodeRenderWithPython;

class QrCodeRenderWithPythonTest extends TestCase
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

        $qrCode = (
            new QrCodeRenderWithPython()
        )
            ->run($image);

        $this->assertSame($this->imageOneQrCode, $qrCode);
    }

    public function testFileWithoutQrCode()
    {
        $image = __DIR__ . '/../../files/qrcodes_images/imageWithoutQrCode.jpg';

        $this->expectException(\Exception::class);
        $this->expectErrorMessage('Recognizing qr code.');

        (
            new QrCodeRenderWithPython()
        )
            ->run($image);
    }

    public function testFileDoesNotExist()
    {
        $image = __DIR__ . '/../../files/qrcodes_images/FileDoesNotExist.jpg';

        $this->expectException(\Exception::class);
        $this->expectErrorMessage('The file is not found.');

        (
            new QrCodeRenderWithPython()
        )
            ->run($image);
    }
}
