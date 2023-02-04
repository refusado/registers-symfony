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

    $result = $doctrine->getAll();

    return new JsonResponse($result);
  }

  /**
   *  @Route("/save", methods={"POST"}, name="register")
   */
  public function saveUser(Request $request): JsonResponse
  {
    $data = $request->query->all();

    dump($data);

    $user = new User;
    $user->setName($data["name"]);
    $user->setEmail($data["email"]);
    $user->setPassword($data["password"]);

    $doctrine = $this->getDoctrine()->getManager();
    $doctrine->persist($user);
    $doctrine->flush();

    // dump($user);

    if ($doctrine->contains($user)) {
      return new JsonResponse("message: $data[name] registered");
    }

    return new JsonResponse('message: "error"', 400);
  }
}