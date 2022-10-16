<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Model\ModelUser;

class UserController extends Controller
{
    private ModelUser $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new ModelUser();
    }
    public function index(Request $req, Response $res, $args) : Response
    {
        //display all users
        $users = $this->model->all();

        return $this->render('app/users/index', [
            'users' => $users
        ]);
    }
}