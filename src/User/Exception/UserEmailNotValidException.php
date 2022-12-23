<?php

namespace App\User\Exception;

class UserEmailNotValidException extends \Exception
{
    public function __construct(string $email)
    {
        $message = sprintf('Email %s is not valid', $email);
        parent::__construct($message);
    }
}