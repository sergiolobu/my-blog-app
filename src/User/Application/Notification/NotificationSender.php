<?php

namespace App\User\Application\Notification;

use App\Shared\Domain\Notifier\Notifier;

class NotificationSender
{
    public function __construct(private readonly Notifier $notifier)
    {
    }

    public function __invoke(string $to, string $text): void
    {
        $this->notifier->notify($to, $text);
    }

}