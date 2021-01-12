<?php

declare(strict_types=1);

namespace Tests\Unit\File;

use PHPUnit\Framework\TestCase;
use Ms\QrCode\File\Image;
use Ms\QrCode\Exceptions\File\ImageNotFoundException;

class ImageTest extends TestCase
{
    private $imagePath;

    public function __construct(string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->imagePath = __DIR__ . '/../../files/qrcodes_images/imageWithoutQrCode.jpg';
    }

    public function testInputPathIsOutputPath()
    {
        $path = (
            new Image($this->imagePath)
        )
            ->path();

        $this->assertSame($this->imagePath, $path);
    }

    public function testFileDoesNotExist()
    {
        $filePath = 'this_file_does_not_exists';

        $this->expectException(ImageNotFoundException::class);
        $this->expectErrorMessage("Error 404: Image file {$filePath} not found");

        (
           new Image($filePath)
        )
            ->path();
    }
}
