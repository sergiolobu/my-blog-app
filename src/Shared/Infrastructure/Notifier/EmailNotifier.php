<?php

namespace App\Shared\Infrastructure\Notifier;

use App\Shared\Domain\Notifier\Notifier;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;

class EmailNotifier implements Notifier
{
    private const FROM = 'sergiolozanobueno@gmail.com';

    private Email $email;
    private Mailer $client;

    public function __construct(string $subject = '')
    {
        $transport = Transport::fromDsn($_ENV['MAILER_DSN']);

        $this->client = new Mailer($transport);

        $this->email = (new Email())
            ->from(self::FROM)
            ->subject($subject);
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function notify(string $to,string $text)
    {
        $this->email
            ->to($to)
            ->text($text);

        $this->client->send($this->email);
    }

}