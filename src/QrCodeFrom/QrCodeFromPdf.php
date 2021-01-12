<?php

declare(strict_types=1);

namespace Ms\QrCode\QrCodeFrom;

use Ms\QrCode\File\FileRepresentationInterface;
use Ms\QrCode\QrCodeRender\QrCodeRenderInterface;

/**
 * Class QrCodeFromPdf
 * @package Ms\Qr\QrCodeFrom
 */
class QrCodeFromPdf implements QrCodeFromInterface
{
    /**
     * @var string
     */
    private $pdfPath;

    /**
     * @var QrCodeRenderInterface
     */
    private $qrCodeRender;

    /**
     * QrCodeFromPdf constructor.
     * @param FileRepresentationInterface $file
     * @param QrCodeRenderInterface $qrCodeRender
     */
    public function __construct(FileRepresentationInterface $file, QrCodeRenderInterface $qrCodeRender)
    {
        $this->pdfPath = $file->path();
        $this->qrCodeRender = $qrCodeRender;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->qrCodeRender->run($this->pdfPath);
    }
}
