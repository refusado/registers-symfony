<?php

namespace App\Controller;

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
    $data = [
      "name" => $request->get('name'),
      "email" => $request->get('email'),
      "password" => $request->get('password')
    ];

    $success = true;

    if ($success) {
      return $this->render("user/success.html.twig", $data);
    }

    return $this->render("user/error.html.twig", $data);
  }
}