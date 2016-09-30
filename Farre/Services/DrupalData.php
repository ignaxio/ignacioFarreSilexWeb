<?php
namespace Farre\Service;

class DrupalData {
  private $basePath;
  
  public function __construct($basePath) {
    $this->basePath = $basePath;
  }

  private function getProxy() {
    // Edit the four values below
    $PROXY_HOST = "proxy.indra.es"; // Proxy server address
    $PROXY_PORT = "8080";    // Proxy server port
    $PROXY_USER = "ifarre";    // Username
    $PROXY_PASS = "ClaveV2-";   // Password
    // Username and Password are required only if your proxy server needs basic authentication

    $auth = base64_encode("$PROXY_USER:$PROXY_PASS");
    stream_context_set_default(
            array(
                'http' => array(
                    'proxy' => "tcp://$PROXY_HOST:$PROXY_PORT",
                    'request_fulluri' => true,
                    'header' => "Proxy-Authorization: Basic $auth"
                // Remove the 'header' option if proxy authentication is not required
                )
            )
    );
  }

  public function getExperiencias() {
    if($_SERVER['HTTP_HOST'] == 'ignaciofarre-silex.local') {
      $this->getProxy();
    }    
    return json_decode(file_get_contents($this->basePath . '/get-experiencias'));
  }
  
  public function getLibros() {
    if($_SERVER['HTTP_HOST'] == 'ignaciofarre-silex.local') {
      $this->getProxy();
    }
    return json_decode(file_get_contents($this->basePath . '/libros'));
  }
  
  public function getCategoriasDeLosTutoriales() {
    if($_SERVER['HTTP_HOST'] == 'ignaciofarre-silex.local') {
      $this->getProxy();
    }
    return json_decode(file_get_contents($this->basePath . '/tutoriales-categorias'));
  }
  public function getCategoriaDeLosTutoriales($categoriaId) {
    if($_SERVER['HTTP_HOST'] == 'ignaciofarre-silex.local') {
      $this->getProxy();
    }
    return json_decode(file_get_contents($this->basePath . '/tutoriales-categorias/' . $categoriaId));
  }
  public function getTutorialesDeUnaCategoria($categoriaId) {
    if($_SERVER['HTTP_HOST'] == 'ignaciofarre-silex.local') {
      $this->getProxy();
    }
    return json_decode(file_get_contents($this->basePath . '/tutoriales/' . $categoriaId));
  }

}

