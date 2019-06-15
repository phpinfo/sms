<?php
declare(strict_types=1);

namespace Phpinfo\Sms\Exception;

class NetworkException extends RuntimeException
{
    public function __construct($message = '', $code = 0, \Throwable $previous = null)
    {
        $message = $message ?: 'Network error occurred';
        parent::__construct($message, $code, $previous);
    }
}
