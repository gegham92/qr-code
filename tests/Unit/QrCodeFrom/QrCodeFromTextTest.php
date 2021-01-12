<?php

declare(strict_types=1);

namespace Tests\Unit\QrCodeFrom;

use PHPUnit\Framework\TestCase;
use Ms\QrCode\QrCodeFrom\QrCodeFromText;

class QrCodeFromTextTest extends TestCase
{
    private $qrCode;

    public function __construct(string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->qrCode = 't=20201221T0905&s=270.00&fn=9282440300853009&i=2353&fp=2862508635&n=1';
    }

    public function testInputQrCodeIsOutputQrCode()
    {
        $qrCode = (
            new QrCodeFromText($this->qrCode)
        )
            ->value();

        $this->assertSame($this->qrCode, $qrCode);
    }
}
