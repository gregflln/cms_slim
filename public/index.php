<?php

use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;

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


$app->group('/auth', function (RouteCollectorProxy $group) {
    //a faire
});
$app->group('/beneficiaires', function (RouteCollectorProxy $group) use ($beneficiaires) {
    $group->get('/', $beneficiaires->index(...));
    $group->get('/show/{id:[0-9]+}', $beneficiaires->show(...));
    $group->get('/create', $beneficiaires->create(...));
    $group->post('/create', $beneficiaires->store(...));
    $group->get('/edit/{id:[0-9]+}', $beneficiaires->edit(...));
    $group->post('/update/{id:[0-9]+}', $beneficiaires->update(...));
    $group->get('/delete/{id:[0-9]+}', $beneficiaires->delete(...));
});
$app->group('/export', function (RouteCollectorProxy $group) use ($export) {
    $group->get('/', $export->index(...));
    //$group->get('/export', $export->export(...));
});

$app->group('/rendezvous', function (RouteCollectorProxy $group) use ($rendezvous) {
    //$group->get('/index', Controller\RendezVousController::class . ':index');
    $group->get('/create/{benefid:[0-9]+}', $rendezvous->create(...));
    $group->post('/create', $rendezvous->store(...));
    //$group->get('/show', Controller\RendezVousController::class . ':show');
    //$group->get('/edit', Controller\RendezVousController::class . ':edit');
    //$group->post('/update', Controller\RendezVousController::class . ':update');
    //$group->get('/delete', Controller\RendezVousController::class . ':delete');
});
$app->group('/visites', function (RouteCollectorProxy $group) use ($visites) {
    //$group->get('/index', Controller\VisiteController::class . ':index');
    $group->get('/create/{benefid:[0-9]+}', $visites->create(...));
    $group->post('/create', $visites->store(...));
    //$group->get('/show', Controller\VisiteController::class . ':show');
    //$group->get('/edit', Controller\VisiteController::class . ':edit');
    //$group->post('/update', Controller\VisiteController::class . ':update');
    //$group->get('/delete', Controller\VisiteController::class . ':delete');
});

//API rest endpoints
$app->group('/api', function (RouteCollectorProxy $group) use ($search) {
    $group->get('/search/{search}', $search->search(...));
});

$app->run();
