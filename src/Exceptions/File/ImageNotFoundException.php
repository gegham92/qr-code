<?php

declare(strict_types=1);

namespace Ms\QrCode\Exceptions\File;

use Throwable;

class ImageNotFoundException extends FileNotFoundException
{
    protected $type = 'Image file';

    public function __construct($path, $message = "", Throwable $previous = null)
    {
        parent::__construct($path, $message, $previous);
    }

    public function getName(): string
    {
        return "{$this->type} not found.";
    }
}
