<?php

namespace App\Tests\User;

use App\Shared\Domain\ValueObject\Uuid;
use App\User\Application\Find\FindUserQuery;
use App\User\Application\Find\FindUserQueryHandler;
use App\User\Application\Find\UserFinder;
use App\User\Domain\User;
use App\User\Domain\UserEmail;
use App\User\Domain\UserId;
use App\User\Domain\UserResponse;
use App\User\Exception\UserNotFoundException;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncode;

class GetUseControllerTest extends WebTestCase
{
    private EntityManager $em;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->em = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $this->em->getConnection()->beginTransaction();
    }

    public function testUserFindSuccess()
    {
        $response = new UserResponse('name','surname', 'email@valid.com');

        $userFinder = $this->createMock(UserFinder::class);
        $userFinder->expects(self::exactly(1))
            ->method('__invoke')
            ->willReturn($this->getTestUser());

        $handler = new FindUserQueryHandler($userFinder);

        $dto = new FindUserQuery(Uuid::random());

        $result = $handler->__invoke($dto);

        $this->assertEquals($result,$response);
    }

    public function testUserFindNotFoundThrowException()
    {
        $this->expectException(UserNotFoundException::class);

        $userFinder = $this->createMock(UserFinder::class);
        $userFinder->expects(self::exactly(1))
            ->method('__invoke')
            ->willReturn(null);

        $handler = new FindUserQueryHandler($userFinder);
        $dto = new FindUserQuery(Uuid::random());

        $handler->__invoke($dto);
    }


    public function testGetUseData()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet., the creation of the test database is missing '
        );

        $client = static::createClient();
        $client->request('GET', '/api/user');

        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
        $this->assertStringContainsString('"name":"test","surname":"surname", "email":"email@valid.com"', $client->getResponse()->getContent());
    }

    public function getTestUser(): User
    {
        return User::create
        (
            new UserId('87efaf14-838e-11ed-a1eb-0242ac120092'),
            'name',
            'surname',
            new UserEmail('email@valid.com')
        );
    }
}