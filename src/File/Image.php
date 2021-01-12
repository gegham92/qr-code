<?php

declare(strict_types=1);

namespace Ms\QrCode\File;

use Ms\QrCode\Exceptions\File\ImageNotFoundException;

/**
 * Class Image
 * @package Ms\QrCode\File
 */
class Image implements FileRepresentationInterface
{
    /**
     * @var string
     */
    private $path;

    /**
     * Image constructor.
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * @return string
     * @throws ImageNotFoundException
     */
    public function path(): string
    {
        if (file_exists($this->path)) {
            return $this->path;
        }

        throw new ImageNotFoundException($this->path);
    }
}
