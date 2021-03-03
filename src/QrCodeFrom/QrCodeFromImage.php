<?php

declare(strict_types=1);

namespace Ms\QrCode\QrCodeFrom;

use Ms\QrCode\File\FileRepresentationInterface;
use Ms\QrCode\QrCodeRender\QrCodeRenderInterface;

/**
 * Class QrCodeFromImage
 * @package Ms\QrCode\QrCodeFrom
 */
class QrCodeFromImage implements QrCodeInterface
{
    /**
     * @var string
     */
    private $imagePath;

    /**
     * @var QrCodeRenderInterface
     */
    private $qrCodeRender;

    /**
     * QrCodeFromImage constructor.
     * @param FileRepresentationInterface $file
     * @param QrCodeRenderInterface $qrCodeRender
     */
    public function __construct(FileRepresentationInterface $file, QrCodeRenderInterface $qrCodeRender)
    {
        $this->imagePath = $file->path();
        $this->qrCodeRender = $qrCodeRender;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->qrCodeRender->run($this->imagePath);
    }
}
