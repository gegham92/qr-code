<?php

declare(strict_types=1);

namespace Ms\QrCode\Exceptions\File;

use Throwable;
use Ms\QrCode\Exceptions\BaseException;

class FileNotFoundException extends BaseException
{
    protected $code = 404;

    protected $message = "Error %d: %s %s not found\n File: %s\n Line: %d";

    protected $type = 'File';

    public function __construct($path, $message = "", Throwable $previous = null)
    {
        if ($message === "") {
            $message = sprintf(
                $this->message,
                $this->getCode(), $this->type, $path, $this->file, $this->getLine()
            );
        } else {
            $this->message = $message;
        }

        parent::__construct($message, $this->code, $previous);
    }
}
