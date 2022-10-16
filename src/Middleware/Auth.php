<?php

namespace App\Middleware;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

use Slim\Psr7\Response;


class Auth
{
    private string $jwt_key;
    private Key $key;

    public function __construct()
    {
        $this->jwt_key = $_ENV['JWT_KEY'];
        $this->key = new Key($this->jwt_key, 'HS256');
    }
    public function checkAuth($req, $handler) : Response
    {
        $res = $handler->handle($req);

        $token = $req->getCookieParams()['token'] ?? null;

        if (self::checkToken($token))
        {
            return $res;
        }

         return $res->withHeader('Location', '/auth/login')->withStatus(302);
    }
    public function alreadyAuth($req, $handler) : Response
    {
        $res = $handler->handle($req);

        $token = $req->getCookieParams()['token'] ?? null;

        if (self::checkToken($token))
        {
            return $res->withHeader('Location', '/app/beneficiaires/')->withStatus(302);
        }

        return $res;
    }
    public function isAdmin($req, $handler) : Response
    {
        $res = $handler->handle($req);

        $token = $req->getCookieParams()['token'] ?? null;

        if (self::checkToken($token))
        {
            $decoded = JWT::decode($token, $this->key);
            if ($decoded->role == "admin")
            {
                return $res;
            }
        }

        return $res->withHeader('Location', '/app/beneficiaires/')->withStatus(302);
    }
    private function checkToken(string | null $token) : bool
    {
        if ($token === null) return false;
        
        try {

            $decoded = JWT::decode($token, $this->key);
            return true;

        } catch (\Exception $e) {
            return false;
        }
    }
}