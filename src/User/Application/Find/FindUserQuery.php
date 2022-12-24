<?php

namespace App\User\Application\Find;

use App\Shared\Domain\Bus\Query\Query;

class FindUserQuery implements Query
{
    public function __construct(private readonly string $id)
    {
    }

    public function getId(): string
    {
        return $this->id;
    }
}