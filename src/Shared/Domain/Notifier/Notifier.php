<?php

namespace App\Shared\Domain\Notifier;

interface Notifier
{
    public function notify(string $to, string $text);
}