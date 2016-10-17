<?php
namespace Controllers;
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
    print_r($drupalData->getExperiencias());
    //Arrays de datos para mandar a la vista
    $datos = [
      'dg' => [
        'titulo' => 'Experto en Drupal 8, AngularJS, Bootstrap y amante del desarrollo web',
        'miNombre' => 'Ignacio Farré',
        'miTlf' => '+34 627190899',
      ],
      'experiencias' => [
        'titulo' => 'Experiencia profesonal.',
        'subTitulo' => 'Tengo <strong>más de ' . $app['annosExperiencia'] . ' años de experincia</strong> en el campo del desarrollo web, y desde entonces, '
        . 'cada día me gusta más programar aplicaciones responsive para ser reproducidas en un navegador web.<br /> Actualmente me encuentro '
        . 'trabajando para <a href="http://www.indracompany.com" title="Indra, empresa lider en desarrollo de aplicaciones">Indra</a>, '
        . 'que es una empresa lider a nivel mundial en el campo del desarrollo de software. En ella, tengo la gran suerte de trabajar en un '
        . 'equipo experto y con unos magníficos compañeros con los que cada día trabajamos codo a codo en proyectos complejos como el del '
        . '<a href="http://www.juntadeandalucia.es" title="Desarrollo web del portal de la Junta de Amdalucía"><strong>portal de la Junta de Andalucía</strong></a>.',
        'proyectos' => $drupalData->getExperiencias(),
      ],
      'tutoriales' => [
        'titulo' => 'Tutoriales escritos por mi sobre desarrollo y programación web',
        'subTitulo' => 'Cuando tengo algún rato libre, que suele ser pocas veces, me encanta compartir conocimientos con los demás, '
        . 'sobre todo cuando son temas en los que hay poca documentación y se que puede haber personas en mi misma situación. <br />'
        . 'Espero que estos tutoriales sean de vuestro interes y espero que acepten posibles errores en ellos, (podéis avisarme para '
        . 'corregirlos si encontráis alguno). Podéis publicar comentarios y preguntas a las que intentaré responder en la medida de lo posible.',
        'categoriasDeLosTutoriales' => $drupalData->getCategoriasDeLosTutoriales(),
      ],
    ];

    //Mandamos los datos
    return $app['twig']->render('home.twig', $datos);
  }

}
