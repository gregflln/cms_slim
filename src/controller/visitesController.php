<?php

namespace App\Controller;

use App\Controller\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Model\ModelVisites;
use App\Model\ModelBeneficiaire;

class VisitesController extends Controller

{
    public function __construct()
    {
        parent::__construct();
        $this->model = new ModelVisites();
        $this->modelBeneficiaire = new ModelBeneficiaire();
    }
    public function index(Request $req, Response $res, $args) : Response
    {
        //display all visites
        $visites = $this->model->all();
        return $this->render('visites/index', [
            'visites' => $visites
        ]);
    }
    public function show(Request $req, Response $res, $args) : Response
    {
        //get post id and return view
        $id = $args['id'];

        $visite = $this->model->find($id);

        return $this->render('visites/show', [
            'visite' => $visite
        ]);
    }
    public function create(Request $req, Response $res, $args) : Response
    {
        $id = $args['benefid'];
        $beneficiaire = $this->modelBeneficiaire->find($id);
        return $this->render('visites/create', [
            'beneficiaire' => $beneficiaire
        ]);
    }
    public function store(Request $req, Response $res, $args) : Response
    {
        //use model to create new rendez-cous from post data
        $data = $_POST;
        //data validation
        $this->model->create($data);
        //redirect to index reponse psr7
        return $res->withHeader('Location', '/visites');
        
    }
    public function edit(Request $req, Response $res, $args) : Response
    {
        //get post id and return view
        $id = $args['id'];

        $visite = $this->model->find($id);

        return $this->render('visites/edit', [
            'visite' => $visite
        ]);
    }
    public function update(Request $req, Response $res, $args) : Response
    {
        //use model to update rendez-vous from post data
        $data = $_POST;
        //data validation
        $this->model->update($data);
        //redirect to index
        return $res->withHeader('Location', '/visites');
    }
    public function delete(Request $req, Response $res, $args) : Response
    {
        //use model to delete rendez-vous from post data
        $data = $_POST;
        //data validation
        $this->model->delete($data);
        //redirect to index
        return $res->withHeader('Location', '/visites');
    }

}