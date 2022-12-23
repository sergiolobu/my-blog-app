<?php

namespace App\User\Application\Create;

use App\User\Domain\User;
use App\User\Domain\UserEmail;
use App\User\Domain\UserId;
use App\User\Domain\UserRepository;

class UserCreator
{
    public function __construct(private readonly UserRepository $repository)
    {
    }

    public function __invoke(UserId $uuid, string $name, string $surname, UserEmail $email): void
    {
        $user = User::create($uuid,$name,$surname,$email);

        $this->repository->save($user);
    }

}