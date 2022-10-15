<?php

namespace App\Controller;

use App\Controller\Controller;

use App\Model\ModelBeneficiaire;
use App\Model\ModelRendezVous;
use App\Model\ModelVisites;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\DataList;

class BeneficiaireController extends Controller
{
    private ModelBeneficiaire $model;
    private DataList $DataList;
    private ModelRendezVous $modelRendezVous;
    private ModelVisites $modelVisites;

    public function __construct()
    {
        parent::__construct();
        $this->model = new ModelBeneficiaire();
        $this->DataList = new DataList();
        $this->modelRendezVous = new ModelRendezVous();
        $this->modelVisites = new ModelVisites();
    }
    public function index(Request $req, Response $res, $args) : Response
    {
        // GET renvoi une vue list des beneficiaires
        $beneficiaires = $this->model->all();

        return $this->render('app/beneficiaires/index', [
            'beneficiaires' => $beneficiaires
        ]);
    }
    public function show(Request $req, Response $res, $args) : Response
    {
        // GET renvoi une vue show d'un beneficiaire
        $id = $args['id'];

        $beneficiaire = $this->model->find($id);

        $situation_professionnelle = $this->DataList->getAll('situation_professionnelle');
        $niveau_etude = $this->DataList->getAll('niveau_etude');
        $sante = $this->DataList->getAll('sante');
        $partenaires = $this->DataList->getAll('partenaires');
        $secteur = $this->DataList->getAll('secteur');
        
        //rendez vous et visites associées au beneficiaire
        $rendezvous = $this->modelRendezVous->findByBeneficiaire($id);
        $visites = $this->modelVisites->findByBeneficiaire($id);

        $data = [
            'beneficiaire' => $beneficiaire,
            'situation_professionnelle' => $situation_professionnelle,
            'niveau_etude' => $niveau_etude,
            'sante' => $sante,
            'partenaires' => $partenaires,
            'secteur' => $secteur,
            'rendezvous' => $rendezvous,
            'visites' => $visites
        ];
        return $this->render('app/beneficiaires/show', [
            'data' => $data
        ]);
    }
    public function create(Request $req, Response $res, $args) : Response
    {
        // GET renvoi une vue create avec formulaire pour creer un beneficiaire
        $situation_professionnelle = $this->DataList->getAll('situation_professionnelle');
        $niveau_etude = $this->DataList->getAll('niveau_etude');
        $sante = $this->DataList->getAll('sante');
        $partenaires = $this->DataList->getAll('partenaires');
        $secteur = $this->DataList->getAll('secteur');
        
        $data = [
            'situation_professionnelle' => $situation_professionnelle,
            'niveau_etude' => $niveau_etude,
            'sante' => $sante,
            'partenaires' => $partenaires,
            'secteur' => $secteur
        ];
        return $this->render('app/beneficiaires/add', [
            'data' => $data
        ]);
    }
    public function store(Request $req, Response $res, $args) : Response
    {
        // POST endpoint sauvegarde un beneficiaire
        $data = $req->getParsedBody();
        $this->model->create($data);
        return $res->withHeader('Location', '/beneficiaires');

    }
    public function edit(Request $req, Response $res, $args) : Response
    {
        // GET renvoi une vue edit avec formulaire pour modifier un beneficiaire
        $id = $args['id'];

        $beneficiaire = $this->model->find($id);

        $situation_professionnelle = $this->DataList->getAll('situation_professionnelle');
        $niveau_etude = $this->DataList->getAll('niveau_etude');
        $sante = $this->DataList->getAll('sante');
        $partenaires = $this->DataList->getAll('partenaires');
        $secteur = $this->DataList->getAll('secteur');
        
        $data = [
            'beneficiaire' => $beneficiaire,
            'situation_professionnelle' => $situation_professionnelle,
            'niveau_etude' => $niveau_etude,
            'sante' => $sante,
            'partenaires' => $partenaires,
            'secteur' => $secteur
        ];
        return $this->render('app/beneficiaires/edit', [
            'data' => $data
        ]);
    }
    public function update(Request $req, Response $res, $args) : Response
    {
        // POST endpoint modifie un beneficiaire
        $id = $args['id'];
        $data = $req->getParsedBody();
        //data validation
        $this->model->update($id, $data);
        return $res->withHeader('Location', '/beneficiaires');
    }
    public function delete(Request $req, Response $res, $args) : Response
    {
        // POST endpoint supprime un beneficiaire
        $id = $args['id'];
        $this->model->delete($id);
        return $res->withHeader('Location', '/beneficiaires');

    }
}