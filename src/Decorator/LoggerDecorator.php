<?php
declare(strict_types=1);

namespace Phpinfo\Sms\Decorator;

use Phpinfo\Sms\Exception\SmsException;
use Phpinfo\Sms\Message\MessageInterface;
use Phpinfo\Sms\Sender\SenderInterface;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;

class LoggerDecorator implements SenderInterface
{
    use LoggerAwareTrait;

    /** @var SenderInterface */
    private $sender;

    /** @var bool */
    private $logText;

    public function __construct(SenderInterface $sender, LoggerInterface $logger, bool $logText = false)
    {
        $this->sender = $sender;
        $this->setLogger($logger);
        $this->logText = $logText;
    }

    /**
     * @param MessageInterface $message
     *
     * @throws SmsException
     */
    public function send(MessageInterface $message): void
    {
        $this->logger->info('Sending message', $this->getMessageContext($message));

        try {
            $this->sender->send($message);
        } catch (SmsException $e) {
            $this->logException($e);
            throw $e;
        }
    }

    protected function logException(\Throwable $throwable): void
    {
        $message = $throwable->getMessage();
        $context = $this->getExceptionContext($throwable);

        $this->logger->error($message, $context);

        $previous = $throwable->getPrevious();
        if ($previous) {
            $this->logException($previous);
        }
    }

    protected function getExceptionContext(\Throwable $throwable): array
    {
        return [
            'type' => get_class($throwable),
            'code' => $throwable->getCode(),
            'file' => $throwable->getFile(),
            'line' => $throwable->getLine(),
        ];
    }

    protected function getMessageContext(MessageInterface $message): array
    {
        $context = [
            'phone'  => $message->getPhone(),
            'sender' => $message->getSenderId(),
        ];

        if ($this->logText) {
            $context['text'] = $message->getText();
        }

        return $context;
    }
}
