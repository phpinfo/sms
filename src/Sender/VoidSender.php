<?php
declare(strict_types=1);

namespace Phpinfo\Sms\Sender;

use Phpinfo\Sms\Message\MessageInterface;

class VoidSender implements SenderInterface
{
    public function send(MessageInterface $message): void
    {
        // nothing to do
    }
}
