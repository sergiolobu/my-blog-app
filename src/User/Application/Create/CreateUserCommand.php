<?php

namespace App\User\Application\Create;

use App\Shared\Domain\Bus\Command\Command;

class CreateUserCommand implements Command
{
    public function __construct(
        private readonly string $id,
        private readonly string $name,
        private readonly string $surname,
        private readonly string $email
    )
    {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}