<?php

namespace App\User\Application\Find;

use App\Shared\Domain\Bus\Query\QueryHandler;
use App\User\Domain\UserId;
use App\User\Domain\UserResponse;
use App\User\Exception\UserNotFoundException;

class FindUserQueryHandler implements QueryHandler
{

    public function __construct(private readonly UserFinder $finder)
    {
    }

    /**
     * @throws UserNotFoundException
     */
    public function __invoke(FindUserQuery $query): UserResponse
    {

        $id = new UserId($query->getId());

        $user = $this->finder->__invoke($id);

        if (is_null($user)) {
            throw new UserNotFoundException();
        }

        return UserResponse::createFromObject($user);
    }

}