<?php

namespace App\Controller;

use App\Controller\Controller;

use App\Model\ModelBeneficiaire;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\DataList;

class BeneficiaireController extends Controller
{
    private ModelBeneficiaire $model;
    private DataList $DataList;

    public function __construct()
    {
        parent::__construct();
        $this->model = new ModelBeneficiaire();
        $this->DataList = new DataList();
    }
    public function index(Request $req, Response $res, $args) : Response
    {
        // GET renvoi une vue list des beneficiaires
        $beneficiaires = $this->model->all();

        return $this->render('beneficiaires/index', [
            'beneficiaires' => $beneficiaires
        ]);
    }
    public function show(Request $req, Response $res, $args) : Response
    {
        // GET renvoi une vue show d'un beneficiaire
        $id = $_GET['id'];

        $beneficiaire = $this->model->find($id);

        $situation_familiale = $this->DataList->getAll('situation_familiale');
        $situation_professionnelle = $this->DataList->getAll('situation_professionnelle');
        $situation_ressources = $this->DataList->getAll('situation_ressources');
        $type_logement = $this->DataList->getAll('type_logement');
        $niveau_etude = $this->DataList->getAll('niveau_etude');
        $sante = $this->DataList->getAll('sante');
        $axe_travail = $this->DataList->getAll('axe_travail');
        $partenaires = $this->DataList->getAll('partenaires');
        $orientation = $this->DataList->getAll('orientation');
        $secteur = $this->DataList->getAll('secteur');
        
        $data = [
            'beneficiaire' => $beneficiaire,
            'situation_familiale' => $situation_familiale,
            'situation_professionnelle' => $situation_professionnelle,
            'situation_ressources' => $situation_ressources,
            'type_logement' => $type_logement,
            'niveau_etude' => $niveau_etude,
            'sante' => $sante,
            'axe_travail' => $axe_travail,
            'partenaires' => $partenaires,
            'orientation' => $orientation,
            'secteur' => $secteur
        ];
        return $this->render('beneficiaires/show', [
            'data' => $data
        ]);
    }
    public function create(Request $req, Response $res, $args) : Response
    {
        // GET renvoi une vue create avec formulaire pour creer un beneficiaire
        $situation_familiale = $this->DataList->getAll('situation_familiale');
        $situation_professionnelle = $this->DataList->getAll('situation_professionnelle');
        $situation_ressources = $this->DataList->getAll('situation_ressources');
        $type_logement = $this->DataList->getAll('type_logement');
        $niveau_etude = $this->DataList->getAll('niveau_etude');
        $sante = $this->DataList->getAll('sante');
        $axe_travail = $this->DataList->getAll('axe_travail');
        $partenaires = $this->DataList->getAll('partenaires');
        $orientation = $this->DataList->getAll('orientation');
        $secteur = $this->DataList->getAll('secteur');
        
        $data = [
            'situation_familiale' => $situation_familiale,
            'situation_professionnelle' => $situation_professionnelle,
            'situation_ressources' => $situation_ressources,
            'type_logement' => $type_logement,
            'niveau_etude' => $niveau_etude,
            'sante' => $sante,
            'axe_travail' => $axe_travail,
            'partenaires' => $partenaires,
            'orientation' => $orientation,
            'secteur' => $secteur
        ];
        return $this->render('beneficiaires/add', [
            'data' => $data
        ]);
    }
    public function store(Request $req, Response $res, $args) : Response
    {
        // POST endpoint sauvegarde un beneficiaire
        $data = $_POST;
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        $this->model->create($data);
        header('Location: /beneficiaires');

    }
    public function edit(Request $req, Response $res, $args) : Response
    {
        // GET renvoi une vue edit avec formulaire pour modifier un beneficiaire
        $id = $_GET['id'];

        $beneficiaire = $this->model->find($id);

        $situation_familiale = $this->DataList->getAll('situation_familiale');
        $situation_professionnelle = $this->DataList->getAll('situation_professionnelle');
        $situation_ressources = $this->DataList->getAll('situation_ressources');
        $type_logement = $this->DataList->getAll('type_logement');
        $niveau_etude = $this->DataList->getAll('niveau_etude');
        $sante = $this->DataList->getAll('sante');
        $axe_travail = $this->DataList->getAll('axe_travail');
        $partenaires = $this->DataList->getAll('partenaires');
        $orientation = $this->DataList->getAll('orientation');
        $secteur = $this->DataList->getAll('secteur');
        
        $data = [
            'beneficiaire' => $beneficiaire,
            'situation_familiale' => $situation_familiale,
            'situation_professionnelle' => $situation_professionnelle,
            'situation_ressources' => $situation_ressources,
            'type_logement' => $type_logement,
            'niveau_etude' => $niveau_etude,
            'sante' => $sante,
            'axe_travail' => $axe_travail,
            'partenaires' => $partenaires,
            'orientation' => $orientation,
            'secteur' => $secteur
        ];
        return $this->render('beneficiaires/edit', [
            'data' => $data
        ]);
    }
    public function update(Request $req, Response $res, $args) : Response
    {
        // POST endpoint modifie un beneficiaire
        $id = $_GET['id'];
        $data = $_POST;
        //data validation
        $this->model->update($id, $data);
        header('Location: /beneficiaires');
    }
    public function delete(Request $req, Response $res, $args) : Response
    {
        // POST endpoint supprime un beneficiaire
        $id = $_GET['id'];
        $this->model->delete($id);
        header('Location: /beneficiaires');

    }
}