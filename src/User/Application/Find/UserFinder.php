<?php

namespace App\User\Application\Find;

use App\User\Domain\User;
use App\User\Domain\UserId;
use App\User\Domain\UserRepository;

final class UserFinder
{
    public function __construct(private readonly UserRepository $repository)
    {
    }

    public function __invoke(UserId $uuid): ?User
    {
        return $this->repository->search($uuid);
    }
}