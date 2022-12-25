<?php

namespace App\Tests\User;

use App\Shared\Domain\ValueObject\Uuid;
use App\User\Application\Create\CreateUserCommand;
use App\User\Application\Create\CreateUserCommandHandler;
use App\User\Application\Create\UserCreator;
use App\User\Application\Notification\NotificationSender;
use App\User\Exception\UserEmailNotValidException;
use PHPUnit\Framework\TestCase;

/**
 * @group test
 */
class CreateUserControllerTest extends TestCase
{
    public function testIfUserEmailIsNotValidThrowException()
    {
        $userCreator = $this->getMockBuilder(UserCreator::class);
        $notifier = $this->getMockBuilder(NotificationSender::class);

        $this->expectException(UserEmailNotValidException::class);
        $handler = new CreateUserCommandHandler
        (
            $userCreator->disableOriginalConstructor()->getMock(),
            $notifier->disableOriginalConstructor()->getMock()
        );

        $dto = new CreateUserCommand(Uuid::random(), 'test', 'test', 'mail-notvalid');

        $handler->__invoke($dto);
    }

    public function testUserCreatedSuccess()
    {
        $userCreator = $this->createMock(UserCreator::class);
        $notifier = $this->createMock(NotificationSender::class);

        $userCreator->expects(self::exactly(1))->method('__invoke');
        $notifier->expects(self::exactly(1))->method('__invoke');

        $handler = new CreateUserCommandHandler($userCreator, $notifier);

        $dto = new CreateUserCommand(Uuid::random(), 'test', 'test', 'mail@valid.com');

        $handler->__invoke($dto);
    }

}