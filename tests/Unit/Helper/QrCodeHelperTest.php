<?php

declare(strict_types=1);

namespace Tests\Unit\Helper;

use PHPUnit\Framework\TestCase;
use Ms\QrCode\Helper\QrCodeHelper;
use Ms\QrCode\Exceptions\File\PdfNotFoundException;
use Ms\QrCode\Exceptions\File\ImageNotFoundException;

class QrCodeHelperTest extends TestCase
{
    private $oneQrCode;

    public function __construct(string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->oneQrCode = 't=20201221T0905&s=270.00&fn=9282440300853009&i=2353&fp=2862508635&n=1';
    }

    // Begin testing "getQrCodeFromImage"
    public function testGetQrCodeFromImageSuccess()
    {
        $image = __DIR__ . "/../../files/qrcodes_images/imageOne.png";

        $resultQrCode = QrCodeHelper::getQrCodeFromImage($image);

        $this->assertSame($this->oneQrCode, $resultQrCode);
    }

    public function testGetQrCodeFromImageFail()
    {
        $image = __DIR__ . "/../../files/qrcodes_images/imageTwo.png";

        $resultQrCode = QrCodeHelper::getQrCodeFromImage($image);

        $this->assertNotSame($this->oneQrCode, $resultQrCode);
    }

    public function testGetQrCodeFromImageWithoutQrCode()
    {
        $image = __DIR__ . "/../../files/qrcodes_images/imageWithoutQrCode.jpg";

        $this->expectException(\Exception::class);
        $this->expectErrorMessage('Recognizing qr code.');

        QrCodeHelper::getQrCodeFromImage($image);
    }

    public function testImageThatDoesNotExist()
    {
        $image = __DIR__ . '/../../files/qrcodes_images/imageThatDoesNotExist.jpg';

        $this->expectException(ImageNotFoundException::class);
        $this->expectErrorMessage("Error 404: Image file {$image} not found");

        QrCodeHelper::getQrCodeFromImage($image);
    }
    // End testing "getQrCodeFromImage"

    // Begin testing "getQrCodeFromPdf"
    public function testGetQrCodeFromPdfSuccess()
    {
        $pdf = __DIR__ . "/../../files/qrcodes_pdf/pdfOne.pdf";

        $resultQrCode = QrCodeHelper::getQrCodeFromPdf($pdf);

        $this->assertSame($this->oneQrCode, $resultQrCode);
    }

    public function testGetQrCodeFromPdfFail()
    {
        $pdf = __DIR__ . "/../../files/qrcodes_pdf/pdfTwo.pdf";

        $resultQrCode = QrCodeHelper::getQrCodeFromPdf($pdf);

        $this->assertNotSame($this->oneQrCode, $resultQrCode);
    }

    public function testGetQrCodeFromPdfWithoutQrCode()
    {
        $pdf = __DIR__ . "/../../files/qrcodes_pdf/pdfWithoutQrCode.pdf";

        $this->expectException(\Exception::class);
        $this->expectErrorMessage('Recognizing qr code.');

        QrCodeHelper::getQrCodeFromPdf($pdf);
    }

    public function testPdfThatDoesNotExist()
    {
        $pdf = __DIR__ . '/../../files/qrcodes_pdf/pdfThatDoesNotExist.pdf';

        $this->expectException(PdfNotFoundException::class);
        $this->expectErrorMessage("Error 404: PDF file {$pdf} not found");

        QrCodeHelper::getQrCodeFromPdf($pdf);
    }
    // End testing "getQrCodeFromPdf"
}
