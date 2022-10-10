<?php

namespace App\Controller;

use App\Controller\Controller;
use App\Database;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class SearchController extends Controller
{
    private \PDO $db;

    public function __construct()
    {
        parent::__construct();
        //use invoke function
        $this->db = (new Database)();
    }
    public function search(Request $req, Response $res, $args) : Response
    {
        $search = $args['search'];
        
        $sql = "SELECT * FROM beneficiaires WHERE nom LIKE :search OR prenom LIKE :search";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['search' => '%' . $search . '%']);
        $result = $stmt->fetchAll();
        
        $res->getBody()->write(json_encode($result));
        return $res->withHeader('Content-Type', 'application/json');
    }
}