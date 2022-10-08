<?php

namespace App\Controller;

use App\Controller\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Model\RendezVousModel;
use App\Model\ModelBeneficiaire;

class RendezVousController extends Controller
{
    private ModelRendezVous $model;
    private ModelBeneficiaire $modelBeneficiaire;
    //private Entity $entity;

    public function __construct()
    {
        parent::__construct();
        $this->model = new ModelRendezVous();
        $this->modelBeneficiaire = new ModelBeneficiaire();
    }
    
    public function show(Request $req, Response $res, $args) : Response
    {
        //get post id and return view
        $id = $args['id'];

        $rendezvous = $this->model->find($id);

        return $this->render('rendezvous/show', [
            'rendezvous' => $rendezvous
        ]);
    }

    public function create(Request $req, Response $res, $args) : Response
    {
        $id = $args['benefid'];
        $beneficiaire = $this->modelBeneficiaire->find($id);
        return $this->render('rendezvous/create', [
            'beneficiaire' => $beneficiaire
        ]);
    }

    public function store(Request $req, Response $res, $args) : Response
    {
        //use model to create new rendez-cous from post data
        $data = $_POST;
        //data validation
        $this->model->create($data);
        //redirect to index
        return $res->withHeader('Location', '/beneficiaires/show?id=' . $data['beneficiaire']);
    }

    public function edit(Request $req, Response $res, $args) : Response
    {
        return $this->render('rendezvous/edit',[]);
    }

    public function update(Request $req, Response $res, $args) : Response
    {
        return $this->render('rendezvous/update',[]);
    }

    public function delete(Request $req, Response $res, $args) : Response
    {
        $this->model->delete($_GET['id']);
        return $res->withHeader('Location', '/rendezvous');
    }
}