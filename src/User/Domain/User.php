<?php

namespace App\User\Domain;

class User
{
    public function __construct
    (
        protected readonly int $id,
        protected readonly int $uuid,
        protected string $name,
        protected string $surname,
        protected string $email
    )
    {
    }

    public function getUuid(): int
    {
        return $this->uuid;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }
}