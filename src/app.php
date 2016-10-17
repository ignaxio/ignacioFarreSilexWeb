<?php

use Silex\Application;
use Silex\Provider\AssetServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Services\DrupalData;

$app = new Application();
$app->register(new ServiceControllerServiceProvider());
$app->register(new AssetServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new HttpFragmentServiceProvider());
$app['twig'] = $app->extend('twig', function ($twig, $app) {
    // add custom globals, filters, tags, ...

    return $twig;
});



$app['basePath'] = 'http://drupal.ignaciofarre.com/rest/ignacio-farre';
$app['drupal_data'] = function ($app) {
  return new DrupalData($app['basePath']);
};

$app['annosExperiencia'] = date('Y') - 2010;



return $app;
