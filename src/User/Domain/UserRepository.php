<?php

namespace App\User\Domain;

interface UserRepository
{
    public function save(User $user);
    public function search(UserId $userId): ?User;
}