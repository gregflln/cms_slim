<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
//import response implementation
use Slim\Psr7\Factory\ResponseFactory;

use League\Plates\Engine;

class Controller
{
    protected Engine $plates;
  
    public function __construct()
    {
        $this->plates = new Engine(__DIR__ . '/../../views');
    }
    protected function render(string $view, array  $data = []) : Response
    {
        $fatory = new ResponseFactory();
        $response = $fatory->createResponse();
        $response->getBody()->write($this->plates->render($view, $data));
        return $response;
    }
}
