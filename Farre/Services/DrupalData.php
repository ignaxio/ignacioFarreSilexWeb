<?php

namespace Farre\Service;

class DrupalData {

  private $basePath;

  public function __construct($basePath) {
    $this->basePath = $basePath;
    $this->basePathOld = 'http://drupal.ignaciofarre.com/ignacio-farre';
  }

  private function getProxy() {
    if ($_SERVER['HTTP_HOST'] == 'ignaciofarre-silex.local') {
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
  }

  public function getExperiencias() {
    $this->getProxy();
    //si me llega desde la rest nueva perfecto, si no es así, hay que cambiar las url's. ¡¡¡ Eliminar cuando se haya corregido el bug !!!
    if($expoeriencias = json_decode(file_get_contents($this->basePath . '/get-experiencias'))) {
      return $expoeriencias;
    }else {   
      //si viene de la url antigua, hay que corregir la url de las imagenes
      $expoeriencias = json_decode(file_get_contents($this->basePathOld . '/get-experiencias'));
      foreach ($expoeriencias as $experiencia) {
        $experiencia->imagen500 = str_replace("ignaciofarre.local", "drupal.ignaciofarre.com", $experiencia->imagen500);
        $experiencia->logo = str_replace("ignaciofarre.local", "drupal.ignaciofarre.com", $experiencia->logo);
      }
      return $expoeriencias;
    }
  }

  public function getLibros() {
    $this->getProxy();
    return json_decode(file_get_contents($this->basePath . '/libros'));
  }

  public function getCategoriasDeLosTutoriales() {
    $this->getProxy();
    return json_decode(file_get_contents($this->basePath . '/tutoriales-categorias'));
  }

  public function getCategoriaDeLosTutoriales($categoriaId) {
    $this->getProxy();
    return json_decode(file_get_contents($this->basePath . '/tutoriales-categorias/' . $categoriaId));
  }

  public function getTutorialesDeUnaCategoria($categoriaId) {
    $this->getProxy();
    return json_decode(file_get_contents($this->basePath . '/tutoriales/' . $categoriaId));
  }

}
