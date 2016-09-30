<?php

namespace Farre;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * Controlador  que 
 */
class HomeController {

  public function homeAction(Request $request, Application $app) {
    /**
     * Controlador de datos
     */
    $drupalData = $app['drupal_data'];

    print_r($drupalData->getCategoriasDeLosTutoriales());


    /**
     * Array de datos para mandar a la vista
     */
    $datosGenereales = [
        'titulo' => 'Experto en Drupal 8, AngularJS, Bootstrap y amante del desarrollo web',
        'miNombre' => 'Ignacio Farré',
        'miTlf' => '+34 627190899',
    ];
    $bloque2 = [
        'titulo' => 'Experiencia profesonal',
        'subTitulo' => 'Tengo más de ' . $app['annosExperiencia'] . ' años de experincia en el campo del desarrollo web, y desde entonces cada día me gusta más programar '
        . 'aplicaciones adaptadas para ser reproducidas en un navegador web.',
        'categoriasDeLosTutoriales' => $drupalData->getCategoriasDeLosTutoriales(),
    ];
    $bloque3 = [
        'experiencias' => $drupalData->getExperiencias(),
    ];

    /**
     * Mandamos los datos
     */
    return $app['twig']->render('home.twig', [
                'datosGenereales' => $datosGenereales,
                'bloque2' => $bloque2,
                'bloque3' => $bloque3,
    ]);
  }
}
