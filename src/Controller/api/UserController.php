<?php

namespace App\Controller\api;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 *  @Route("api/v1", name="api_v1_user_")
 */
class UserController extends AbstractController
{
  /**
   * @Route("/user", methods={"GET"}, name="list")
   */
  public function getUsers(): JsonResponse
  {
    $doctrine = $this->getDoctrine()->getRepository(User::class);

    dump($doctrine->getAll());

    return new JsonResponse("Retornar usuários do banco de dados");
  }

  /**
   *  @Route("/save", methods={"POST"}, name="register")
   */
  public function saveUser(Request $request): JsonResponse
  {
    return new JsonResponse("Salvar usuário no banco de dados");
  }
}