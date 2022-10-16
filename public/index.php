<?php

use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;

use App\Middleware;

require __DIR__ . '/../vendor/autoload.php';

//populate environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$app = AppFactory::create();

//instantiate controllers
$beneficiaires = new App\Controller\BeneficiaireController();
$rendezvous = new App\Controller\RendezVousController();
$visites = new App\Controller\VisitesController();
$export = new App\Controller\ExportController();
$search = new App\Controller\SearchController();
$user = new App\Controller\UserController();
$auth = new App\Controller\AuthController();

//instantiate middlewares
$authMiddleware = new Middleware\Auth();


$app->group('/auth', function (RouteCollectorProxy $group) use ($auth) {
    $group->get('/login', $auth->loginView(...));
    $group->post('/login', $auth->login(...));
    $group->get('/logout', $auth->logout(...));
})->add($authMiddleware->alreadyAuth(...));

$app->group("/app", function (RouteCollectorProxy $group) use ($beneficiaires, $rendezvous, $visites, $export, $search, $user, $authMiddleware) {
    
    $group->group('/beneficiaires', function (RouteCollectorProxy $group) use ($beneficiaires) {
        $group->get('/', $beneficiaires->index(...));
        $group->get('/show/{id:[0-9]+}', $beneficiaires->show(...));
        $group->get('/create', $beneficiaires->create(...));
        $group->post('/create', $beneficiaires->store(...));
        $group->get('/edit/{id:[0-9]+}', $beneficiaires->edit(...));
        $group->post('/update/{id:[0-9]+}', $beneficiaires->update(...));
        $group->get('/delete/{id:[0-9]+}', $beneficiaires->delete(...));
    });
    
    $group->group('/export', function (RouteCollectorProxy $group) use ($export) {
        $group->get('/', $export->index(...));
    });
    
    $group->group('/rendezvous', function (RouteCollectorProxy $group) use ($rendezvous) {
       
        $group->get('/create/{benefid:[0-9]+}', $rendezvous->create(...));
        $group->post('/create', $rendezvous->store(...));
       
    });
    $group->group('/visites', function (RouteCollectorProxy $group) use ($visites) {
       
        $group->get('/create/{benefid:[0-9]+}', $visites->create(...));
        $group->post('/create', $visites->store(...));
        
    });
    //API rest endpoints
    $group->group('/api', function (RouteCollectorProxy $group) use ($search) {
        $group->get('/search/{search}', $search->search(...));
    });

    $group->group('/admin', function (RouteCollectorProxy $group) use ($user) {
        $group->get('/users', $user->index(...));
    })->add($authMiddleware->isAdmin(...));
    
})->add($authMiddleware->checkAuth(...));

$app->run();
