<?php

namespace App\User\Infrastructure;

use App\Shared\Infrastructure\Doctrine\DoctrineRepository;
use App\User\Domain\User;
use App\User\Domain\UserId;
use App\User\Domain\UserRepository;

class UserRepositoryMysql extends DoctrineRepository implements UserRepository
{
    public function save(User $user): void
    {
        $this->persist($user);
    }

    public function search(UserId $userId): ?User
    {
        return $this->repository(User::class)->find($userId);
    }
}