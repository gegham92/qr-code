<?php

declare(strict_types=1);

namespace Ms\QrCode;

class Config
{
    public function value(): array
    {
        return [
            'qr_code_reader_path' => __DIR__ . '/../python/BarcodeReadDemo_python.py'
        ];
    }
}
