<?php
declare(strict_types=1);

namespace Phpinfo\Sms\Exception;

class InvalidAuthorizationException extends RuntimeException
{
    public function __construct($message = '', $code = 0, \Throwable $previous = null)
    {
        $message = $message ?: 'Unable to authorize transport';
        parent::__construct($message, $code, $previous);
    }
}
