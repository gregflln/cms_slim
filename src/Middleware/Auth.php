<?php

namespace App\Middleware;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

use Slim\Psr7\Response;


class Auth
{
    public static function checkAuth($req, $handler)
    {
        $res = $handler->handle($req);

        $token = $req->getCookieParams()['token'] ?? null;

        if (self::checkToken($token))
        {
            return $res;
        }

         return $res->withHeader('Location', '/auth/login')->withStatus(302);
    }
    private static function checkToken(string | null $token) : bool
    {
        $key = $_ENV['JWT_KEY'];

        $jwt_key = new Key($key, 'HS256');

        if ($token === null) return false;
        
        try {

            $decoded = JWT::decode($token, $jwt_key);
            return true;

        } catch (\Exception $e) {
            return false;
        }
    }
}