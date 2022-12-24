<?php

namespace App\Controller\User;

use App\Shared\Domain\Bus\Query\QueryBus;
use App\User\Application\Find\FindUserQuery;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetController extends AbstractController
{
    public function __construct(private readonly QueryBus $queryBus)
    {
    }

    #[Route('/user', methods: ['GET'])]
    public function __invoke(Request $request)
    {
        try {

            $query = new FindUserQuery($request->get('id'));

            $response = $this->queryBus->ask($query);

            return new JsonResponse([
                    $response,
                    Response::HTTP_OK,
                ]
            );
        } catch (\Exception $exception) {
            return new JsonResponse(['status' => sprintf('Bad Request (%s)', $exception->getMessage())], Response::HTTP_BAD_REQUEST);
        }
    }
}