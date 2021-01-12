<?php

declare(strict_types=1);

namespace Ms\QrCode\Helper;

use Ms\QrCode\File\Image;
use Ms\QrCode\File\Pdf;
use Ms\QrCode\QrCodeFrom\QrCodeFromImage;
use Ms\QrCode\QrCodeFrom\QrCodeFromPdf;
use Ms\QrCode\QrCodeRender\QrCodeRenderWithPython;

/**
 * Class QrCodeHelper
 * @package Ms\QrCode\Helper
 */
class QrCodeHelper
{
    /**
     * @param string $imagePath
     * @return string
     */
    public static function getQrCodeFromImage(string $imagePath): string
    {
        return (
            new QrCodeFromImage(
                new Image($imagePath),
                new QrCodeRenderWithPython()
            )
        )
            ->value();
    }

    /**
     * @param string $pdfPath
     * @return string
     */
    public static function getQrCodeFromPdf(string $pdfPath): string
    {
        return (
            new QrCodeFromPdf(
                new Pdf($pdfPath),
                new QrCodeRenderWithPython()
            )
        )
            ->value();
    }
}

