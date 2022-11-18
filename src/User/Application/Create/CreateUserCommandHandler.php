<?php

namespace App\User\Application\Create;
use App\User\Domain\UserId;

class CreateUserCommandHandler
{
    public function __construct
    (
        private readonly UserCreator $creator
    )
    {
    }

    public function __invoke(CreateUserCommand $command): void
    {
        $id = new UserId($command->getId());
        $name = $command->getName();
        $surname = $command->getSurname();
        $email = $command->getEmail();

        $this->creator->__invoke($id,$name,$surname,$email);
    }
}