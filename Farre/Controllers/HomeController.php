<?php
namespace Farre;
use Silex\Application;

/**
 * Controlador que maneja el index, la página principal
 */
class HomeController {

  /**
   * Función que maneja los datos para mendar a la vista de la página principal
   * @param Application $app
   * @return view
   */
  public function homeAction(Application $app) {
    //Controlador de datos
    $drupalData = $app['drupal_data'];
    
    //Arrays de datos para mandar a la vista
    $datos = [
        'dg' => [
            'titulo' => 'Experto en Drupal 8, AngularJS, Bootstrap y amante del desarrollo web',
            'miNombre' => 'Ignacio Farré',
            'miTlf' => '+34 627190899',
        ],
        'bloque2' => [
            'titulo' => 'Experiencia profesonal',
            'subTitulo' => 'Tengo más de ' . $app['annosExperiencia'] . ' años de experincia en el campo del desarrollo web, y desde entonces cada día me gusta más programar '
            . 'aplicaciones adaptadas para ser reproducidas en un navegador web.',
            'categoriasDeLosTutoriales' => $drupalData->getCategoriasDeLosTutoriales(),
        ],
        'bloque3' => [
            'experiencias' => '$drupalData->getExperiencias()',
        ],
    ];

    //Mandamos los datos
    return $app['twig']->render('home.twig', $datos);
  }

}
