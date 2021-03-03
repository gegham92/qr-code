<?php

declare(strict_types=1);

namespace Ms\QrCode\QrCodeFrom;

/**
 * Interface QrCodeFromInterface
 * @package Ms\QrCode\QrCodeFrom
 */
interface QrCodeInterface
{
    /**
     * @return string
     */
    public function value(): string;
}
