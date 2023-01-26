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
    return new Response('Retornar página de usuário salvo');
  }
}