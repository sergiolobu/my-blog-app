<?php

namespace App\User\Domain;

final class User
{
    public function __construct
    (
        protected readonly UserId $id,
        protected string $name,
        protected string $surname,
        protected string $email
    )
    {
    }

    public static function create(UserId $id, string $name, string $surname, string $email): User
    {
        return new self($id,$name,$surname,$email);
    }

    public function getId(): UserId
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

    public function getEmail(): ?string
    {
        return $this->email;
    }
}