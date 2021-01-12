<?php


namespace Ms\QrCode\Exceptions\Render;

use Throwable;

class InvalidQrCodeException extends QrCodeRenderException
{
    protected $code = 400;

    protected $message = "Error %d: Invalid qr code.\n File: %s\n Line: %d";

    public function __construct($message = "", Throwable $previous = null)
    {
        if ($message === "") {
            $message = sprintf(
                $this->message,
                $this->getCode(), $this->file, $this->getLine()
            );
        } else {
            $this->message = $message;
        }

        parent::__construct($message, $this->code, $previous);
    }
}
