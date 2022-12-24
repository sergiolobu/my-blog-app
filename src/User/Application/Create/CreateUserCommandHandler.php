<?php

namespace App\User\Application\Create;
use App\Shared\Domain\Bus\Command\CommandHandler;
use App\User\Application\Notification\NotificationSender;
use App\User\Domain\UserEmail;
use App\User\Domain\UserId;

class CreateUserCommandHandler implements CommandHandler
{
    public function __construct
    (
        private readonly UserCreator $creator,
        private readonly NotificationSender $notifier
    )
    {
    }

    public function __invoke(CreateUserCommand $command): void
    {
        $id = new UserId($command->getId());
        $name = $command->getName();
        $surname = $command->getSurname();
        $email = UserEmail::create($command->getEmail());

        $this->creator->__invoke($id,$name,$surname,$email);
        $this->notifier->__invoke($email, sprintf('User %s, was created successfully', $email));
    }
}