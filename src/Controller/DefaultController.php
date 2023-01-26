<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route; 

class DefaultController
{ 
  // public static function index(Request $request): Response
  // {   
  //   $data = json_encode([
  //     "name" => $request->get('name'),
  //     "ip" => $request->getClientIp()
  //   ]);

  //   $res = new Response();
  //   $res->setContent($data);
  //   $res->setStatusCode(200);
  //   $res->headers->set('Content-Type', 'application/json');

  //   return $res;
  // }
}