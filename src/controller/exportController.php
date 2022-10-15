<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Controller\Controller;

class ExportController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(Request $req, Response $res, $args) : Response
    {
       return $this->render('app/export/index', []);
    }
}