<?php

namespace App\Tests\User;

use App\Shared\Domain\ValueObject\Uuid;
use App\User\Domain\User;
use App\User\Domain\UserEmail;
use App\User\Domain\UserId;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

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

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function testGetUseData()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet., the creation of the test database is missing '
        );

        $user = $this->createTestUser();

        $client = static::createClient();
        $client->request('GET', '/api/user');

        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
        $this->assertStringContainsString('"name":"test","surname":"surname", "email":"email@valid.com"', $client->getResponse()->getContent());
    }

    public function createTestUser(): User
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