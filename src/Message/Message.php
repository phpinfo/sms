<?php
declare(strict_types=1);

namespace Phpinfo\Sms\Message;

class Message implements MessageInterface
{
    /** @var int */
    private $phone;

    /** @var string */
    private $text;

    /** @var string|null */
    private $senderId;

    public function __construct(int $phone, string $text)
    {
        $this->phone = $phone;
        $this->text  = $text;
    }

    public function getPhone(): int
    {
        return $this->phone;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getSenderId(): ?string
    {
        return $this->senderId;
    }

    public function setSenderId(?string $senderId): self
    {
        $this->senderId = $senderId;
        return $this;
    }
}
