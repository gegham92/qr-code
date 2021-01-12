<?php

declare(strict_types=1);

namespace Ms\QrCode\Exceptions\File;

use Throwable;

class PdfNotFoundException extends FileNotFoundException
{
    protected $type = 'PDF file';

    public function __construct($path, $message = "", Throwable $previous = null)
    {
        parent::__construct($path, $message, $previous);
    }

    public function getName(): string
    {
        return "{$this->type} not found.";
    }
}
