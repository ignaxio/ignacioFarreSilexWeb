<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../Farre/Services/DrupalData.php';
require_once __DIR__ . '/../Farre/Controllers/HomeController.php';
require_once __DIR__ . '/../Farre/Controllers/TutorialesController.php';

use Farre\Service\DrupalData;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/views',
));

$app['basePath'] = 'http://drupal.ignaciofarre.com/rest/ignacio-farre';
$app['drupal_data'] = function ($app) {
  return new DrupalData($app['basePath']);
};

$app['annosExperiencia'] = date('Y') - 2010;

// Rutas
$app->get('/', 'Farre\HomeController::homeAction');
$app->get('/tutoriales/taxonomy/term/{$categoriaId}', 'Farre\TutorialesController::getTutorialesDeUnaCategoriaAction');
//$app->get('/tutoriales/taxonomy/term/{$categoriaId}/{tutorialId}', 'Farre\TutorialesController::getTutorialAction');

$app->run();
