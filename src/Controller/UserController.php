<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/", name="web_user_");
 */
class UserController extends AbstractController
{
  /**
   * @Route("/", methods={"GET"}, name="list")
   */
  public function getUsers(): Response
  {
    return $this->render("user/form.html.twig");
  }

  /**
   * @Route("/save", methods={"POST"}, name="register")
   */
  public function saveUser(Request $request): Response
  {
    $data = $request->request->all();

    $user = new User;
    $user->setName($data["name"]);
    $user->setEmail($data["email"]);
    $user->setPassword($data["password"]);

    $doctrine = $this->getDoctrine()->getManager();
    $doctrine->persist($user);
    $doctrine->flush();

    // dump($user);

    if ($doctrine->contains($user)) {
      return $this->render("user/success.html.twig", [
        "name" => $data['name'],
      ]);
    }

    return $this->render("user/error.html.twig", [
      "name" => $data['name'],
    ]);
  }
}