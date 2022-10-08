<?php

namespace App\Controller;

use App\Controller\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class SearchController extends Controller
{
    public function index(Request $req, Response $res, $args) : Response
    {
        return $this->render('beneficiaires/search');
    }
    
    public function search(Request $req, Response $res, $args) : Response
    {
        var_dump($args);
        $search = $args['search'];
        // API fulltext nom prenom search endpoint JSON
        $sql = "SELECT * FROM beneficiaires WHERE nom LIKE :search OR prenom LIKE :search";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['search' => '%' . $search . '%']);
        $result = $stmt->fetchAll();
        $res->getBody()->write(json_encode($result));
    }
}