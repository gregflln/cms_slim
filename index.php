<?php

use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;

require __DIR__ . '/vendor/autoload.php';

//populate environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$app = AppFactory::create();

//instantiate controllers
$beneficiaires = new App\Controller\BeneficiaireController();
//$rendezvous = new Controller\RendezVousController();
//$visites = new Controller\VisiteController();
//$export = new Controller\ExportController();
$search = new App\Controller\SearchController();


$app->group('/auth', function (RouteCollectorProxy $group) {
    //a faire
});
$app->group('/beneficiaires', function (RouteCollectorProxy $group) use ($beneficiaires) {
    $group->get('/', $beneficiaires->index(...));
});
$app->group('/rendezvous', function (RouteCollectorProxy $group) {
    //$group->get('/index', Controller\RendezVousController::class . ':index');
    $group->get('/create', Controller\RendezVousController::class . ':create');
    $group->post('/store', Controller\RendezVousController::class . ':store');
    //$group->get('/show', Controller\RendezVousController::class . ':show');
    //$group->get('/edit', Controller\RendezVousController::class . ':edit');
    //$group->post('/update', Controller\RendezVousController::class . ':update');
    //$group->get('/delete', Controller\RendezVousController::class . ':delete');
});
$app->group('/visites', function (RouteCollectorProxy $group) {
    //$group->get('/index', Controller\VisiteController::class . ':index');
    $group->get('/create', Controller\VisiteController::class . ':create');
    $group->post('/store', Controller\VisiteController::class . ':store');
    //$group->get('/show', Controller\VisiteController::class . ':show');
    //$group->get('/edit', Controller\VisiteController::class . ':edit');
    //$group->post('/update', Controller\VisiteController::class . ':update');
    //$group->get('/delete', Controller\VisiteController::class . ':delete');
});
$app->group('/export', function (RouteCollectorProxy $group) {
    $group->get('/index', Controller\ExportController::class . ':index');
    //$group->get('/create', Controller\ExportController::class . ':create');
    //$group->post('/store', Controller\ExportController::class . ':store');
    //$group->get('/show', Controller\ExportController::class . ':show');
    //$group->get('/edit', Controller\ExportController::class . ':edit');
    //$group->post('/update', Controller\ExportController::class . ':update');
    //$group->get('/delete', Controller\ExportController::class . ':delete');
});

//API rest endpoints
$app->group('/api', function (RouteCollectorProxy $group) use ($search) {
    $group->get('/search', $search->search(...));
});

$app->run();
