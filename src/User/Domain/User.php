<?php

namespace App\User\Domain;

final class User
{
    public function __construct
    (
        protected readonly string $id,
        protected string $name,
        protected string $surname,
        protected string $email
    )
    {
    }

    public static function create(UserId $id, string $name, string $surname, UserEmail $email): User
    {
        return new self($id,$name,$surname,$email);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}