<?php

namespace App\Controller\User;

use App\Shared\Domain\Bus\Command\CommandBus;
use App\Shared\Domain\ValueObject\Uuid;
use App\User\Application\Create\CreateUserCommand;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CreateController extends AbstractController
{
    public function __construct(private readonly CommandBus $commandBus)
    {
    }

    #[Route('/user', methods: ['POST'])]
    public function __invoke(Request $request)
    {
        try {
            $data = json_decode($request->getContent(), true);

            $id = $data['id'] ?? Uuid::random();
            $name = $data['name'];
            $surname = $data['surname'];
            $email = $data['email'];

            $dto = new CreateUserCommand($id, $name, $surname, $email);

            $this->commandBus->dispatch($dto);
        } catch (\Exception $exception) {
            return new JsonResponse(['status' => sprintf('Error (user not created : %s)',$exception->getMessage())], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return new JsonResponse(['status' => 'user created'], Response::HTTP_CREATED);
    }

}