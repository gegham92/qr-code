<?php

declare(strict_types=1);

namespace Ms\QrCode\Exceptions\Render;

use Ms\QrCode\Exceptions\BaseException;
use Throwable;

class QrCodeRenderException extends BaseException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
