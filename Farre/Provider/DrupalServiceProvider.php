<?php

namespace Farre\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;

class DrupalServiceProvider implements ServiceProviderInterface {
  private $basePath;

  public function register(Application $app) {
    $app['hello'] = $app->protect(function ($name) use ($app) {
      $default = $app['hello.default_name'] ? $app['hello.default_name'] : '';
      $name = $name ? : $default;

      return 'Hello ' . $app->escape($name);
    });
  }
  
  function getBasePath() {
    return $this->basePath;
  }

  function setBasePath($basePath) {
    $this->basePath = $basePath;
  }

  
  public function boot(Application $app) {
    
  }

}
