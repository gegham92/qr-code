<?php

declare(strict_types=1);

namespace Ms\QrCode\File;

use Ms\QrCode\Exceptions\File\PdfNotFoundException;

/**
 * Class Pdf
 * @package Ms\Qr\File
 */
class Pdf implements FileRepresentationInterface
{
    /**
     * @var string
     */
    private $path;

    /**
     * Pdf constructor.
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * @return string
     * @throws PdfNotFoundException
     */
    public function path(): string
    {
        if (file_exists($this->path)) {
            return $this->path;
        }

        throw new PdfNotFoundException($this->path);
    }
}
