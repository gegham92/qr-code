<?php

declare(strict_types=1);

namespace Ms\QrCode\QrCodeFrom;

/**
 * Class QrCodeFromText
 * @package Ms\Qr\QrCodeFrom
 */
class QrCodeFromText implements QrCodeFromInterface
{
    /**
     * @var string
     */
    private $qrCode;

    /**
     * QrCodeFromText constructor.
     * @param string $qrCodeText
     */
    public function __construct(string $qrCodeText)
    {
        $this->qrCode = $qrCodeText;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->qrCode;
    }
}