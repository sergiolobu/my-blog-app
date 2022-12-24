<?php

namespace App\User\Domain;

use App\Shared\Domain\Bus\Query\Response;

final class UserResponse implements Response
{
    public function __construct(public string $name, public string $surname, public string $email)
    {
    }

    public static function createFromObject(User $user): UserResponse
    {
        return new UserResponse($user->getName(), $user->getSurname(), $user->getEmail());
    }

}