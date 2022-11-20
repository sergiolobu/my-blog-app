<?php

namespace App\Shared\Infrastucture\Doctrine;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

abstract class DoctrineRepository
{
    public function __construct(private readonly EntityManagerInterface $em)
    {
    }

    protected function entityManager(): EntityManagerInterface
    {
        return $this->em;
    }

    protected function persist($entity): void
    {
        $this->entityManager()->persist($entity);
        $this->entityManager()->flush($entity);
    }

    protected function remove($entity): void
    {
        $this->entityManager()->remove($entity);
        $this->entityManager()->flush($entity);
    }

    protected function repository(string $entityClass): EntityRepository
    {
        return $this->em->getRepository($entityClass);
    }

}