<?php

declare(strict_types=1);

namespace Ms\QrCode\QrCodeRender;

/**
 * Interface QrCodeRenderInterface
 * @package Ms\QrCode\QrCodeRender
 */
interface QrCodeRenderInterface
{
    /**
     * @param string $imagePath
     * @return string
     */
    public function run(string $imagePath): string;
}
