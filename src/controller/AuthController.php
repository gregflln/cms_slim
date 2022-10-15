<?php

namespace App\Controller;

use App\Controller\Controller;
use App\Model\ModelUser;
use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Firebase\JWT\JWT;

class AuthController extends Controller
{
    private ModelUser $model;
    public function __construct()
    {
        parent::__construct();
        $this->model = new ModelUser();
    }
    public function loginView(Request $req, Response $res, $args) : Response
    {
        return $this->render('auth/login');
    }
    public function login(Request $req, Response $res, $args) : Response
    {
        $data = $req->getParsedBody();

        $email = $data['email'];
        $password = $data['password'];

        //Rakit data validation
        //a faire
        //
        $password_hash = hash('sha256', $password, false);


        $user = $this->model->findByEmail($email);

        //check utilisateur existe et password match
        if ($user === false || $user['password'] !== $password_hash) {
            return $res->withHeader('Location', '/auth/login/')->withStatus(302);
        }
        $token = $this->generateToken($user);

        return $res
        ->withAddedHeader('Set-Cookie', "token=$token; Path=/; HttpOnly")
        ->withHeader('Location', '/app/beneficiaires/')
        ->withStatus(302);
    }
    public function logout(Request $req, Response $res, $args) : Response
    {
        return $res
        ->withAddedHeader('Set-Cookie', "token=; Path=/; HttpOnly; Expires=Thu, 01 Jan 1970 00:00:00 GMT")
        ->withHeader('Location', '/auth/login')
        ->withStatus(302);
    }
    private function generateToken(array $user) : string
    {
        $key = $_ENV['JWT_KEY'];
        $payload = [
            'id' => $user['id'],
            'email' => $user['email']
        ];
        $token = JWT::encode($payload, $key, "HS256");
        return $token;
    }
}