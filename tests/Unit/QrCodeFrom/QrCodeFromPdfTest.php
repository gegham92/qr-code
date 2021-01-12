<?php

declare(strict_types=1);

namespace Tests\Unit\QrCodeFrom;

use PHPUnit\Framework\TestCase;
use Ms\QrCode\QrCodeFrom\QrCodeFromPdf;
use Ms\QrCode\File\Pdf;
use Ms\QrCode\QrCodeRender\QrCodeRenderWithPython;

class QrCodeFromPdfTest extends TestCase
{
    private $pdfOneQrCode;

    public function __construct(string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->pdfOneQrCode = 't=20201221T0905&s=270.00&fn=9282440300853009&i=2353&fp=2862508635&n=1';
    }

    public function testSuccess()
    {
        $pdf = __DIR__ . "/../../files/qrcodes_pdf/pdfOne.pdf";

        $resultQrCode = (
            new QrCodeFromPdf(
                new Pdf($pdf),
                new QrCodeRenderWithPython()
            )
        )
            ->value();

        $this->assertSame($this->pdfOneQrCode, $resultQrCode);
    }

    public function testFail()
    {
        $pdf = __DIR__ . "/../../files/qrcodes_pdf/pdfTwo.pdf";

        $resultQrCode = (
            new QrCodeFromPdf(
                new Pdf($pdf),
                new QrCodeRenderWithPython()
            )
        )
            ->value();

        $this->assertNotSame($this->pdfOneQrCode, $resultQrCode);
    }

    public function testPdfWithoutQrCode()
    {
        $pdf = __DIR__ . "/../../files/qrcodes_pdf/pdfWithoutQrCode.pdf";

        $this->expectException(\Exception::class);
        $this->expectErrorMessage('Recognizing qr code.');

        (
            new QrCodeFromPdf(
                new Pdf($pdf),
                new QrCodeRenderWithPython()
            )
        )
            ->value();
    }
}
