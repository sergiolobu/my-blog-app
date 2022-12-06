<?php

namespace App\User\Infrastructure;

use App\Shared\Infrastructure\Doctrine\DoctrineRepository;
use App\User\Domain\User;
use App\User\Domain\UserRepository;

class UserRepositoryMysql extends DoctrineRepository implements UserRepository
{
    public function save(User $user): void
    {
        $this->persist($user);
    }
}