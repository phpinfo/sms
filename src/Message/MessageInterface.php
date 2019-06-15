<?php
declare(strict_types=1);

namespace Phpinfo\Sms\Message;

interface MessageInterface
{
    /**
     * Retrieves phone
     * @return int
     */
    public function getPhone(): int;

    /**
     * Retrieves message text
     * @return string
     */
    public function getText(): string;

    /**
     * Retrieves sender
     * @return string|null
     */
    public function getSenderId(): ?string;
}
