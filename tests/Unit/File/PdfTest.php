<?php

declare(strict_types=1);

namespace Tests\Unit\File;

use PHPUnit\Framework\TestCase;
use Ms\QrCode\File\Pdf;
use Ms\QrCode\Exceptions\File\PdfNotFoundException;

class PdfTest extends TestCase
{
    private $pdfPath;

    public function __construct(string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->pdfPath = __DIR__ . '/../../files/qrcodes_pdf/pdfWithoutQrCode.pdf';
    }

    public function testInputPathIsOutputPath()
    {
        $path = (
            new Pdf($this->pdfPath)
        )
            ->path();

        $this->assertSame($this->pdfPath, $path);
    }

    public function testFileDoesNotExist()
    {
        $filePath = 'this_file_does_not_exists';

        $this->expectException(PdfNotFoundException::class);
        $this->expectErrorMessage("Error 404: PDF file {$filePath} not found");

        (
            new Pdf($filePath)
        )
            ->path();
    }
}
