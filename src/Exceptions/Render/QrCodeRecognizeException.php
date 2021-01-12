<?php


namespace Ms\QrCode\Exceptions\Render;

use Throwable;

class QrCodeRecognizeException extends QrCodeRenderException
{
    protected $code = 400;

    protected $message = "Error %d: Recognizing qr code.\n File: %s\n Line: %d";

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
