<?php
declare(strict_types=1);

namespace Phpinfo\Sms\Sender;

use Phpinfo\Sms\Exception\SmsException;
use Phpinfo\Sms\Message\MessageInterface;

interface SenderInterface
{
    /**
     * @param MessageInterface $message
     *
     * @throws SmsException
     */
    public function send(MessageInterface $message): void;
}
