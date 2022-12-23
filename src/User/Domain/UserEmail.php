<?php

namespace App\User\Domain;

use App\User\Exception\UserEmailNotValidException;

final class UserEmail
{
    public function __construct(protected string $email)
    {
        $this->assertValueIsValid($email);
    }

    public static function create(string $email): UserEmail
    {
        return new self($email);
    }

    public function getValue(): string
    {
        return $this->email;
    }

    public function __toString(): string
    {
        return $this->getValue();
    }

    private function assertValueIsValid(string $value): void
    {
        if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
            throw new UserEmailNotValidException($value);
        }
    }

}