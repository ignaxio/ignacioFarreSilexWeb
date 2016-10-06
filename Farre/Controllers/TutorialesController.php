<?php
namespace Farre;
use Silex\Application;

/**
 * Clase que controla todo lo referente a los turoriales de programación
 */
class TutorialesController {

  private $drupalData;

  /**
   * Controlador que pinta la página de categoría de los tutoriales
   * @param Application $app
   * @param string $categoriaId
   * @return view
   */
  public function tutorialesDeUnaCategoriaAction(Application $app, $categoriaId) {
    //Controlador de datos
    $this->drupalData = $app['drupal_data'];

    //Tenemos que pedir los datos de la categoría y de los tutoriales de esa categoría
    $categoria = $this->drupalData->getCategoriaDeLosTutoriales($categoriaId);
    $tutoriales = $this->drupalData->getTutorialesDeUnaCategoria($categoriaId);
    $tutorialesFinales = [];
    //Para los tutoriales hay que transformar las fechas a formatos válidos.
    foreach ($tutoriales as $key => $tutorial) {      
      $tutorial = [
          'titulo' => $tutorial->title[0]->value,
          'textoResumen' => $tutorial->field_tutorial_subtitulo[0]->value,
          'imagen' => $tutorial->field_image,
          'url' => $tutorial->path,
          'fechaPublicacion' => date("d-m-Y", $tutorial->created[0]->value),
              ];
      $tutorialesFinales[$key] = $tutorial;
    }

    //print_r($categoria[0]->field_categoria_titulo_desc[0]->value);
    //Arrays de datos para mandar a la vista
    $datos = [
        'dg' => [
            'titulo' => $categoria[0]->name[0]->value,
            'subtitulo' => $categoria[0]->field_categoria_titulo_desc[0]->value,
            'imagen' => $categoria[0]->field_categoria_imagen[0],
            'texto' => $categoria[0]->description[0]->value,
        ],
        'tutoriales' => $tutorialesFinales,
    ];
    return $app['twig']->render('categoria-de-los-tutoriales.twig', $datos);
  }

//  public function getTutorialAction(Application $app, $categoria, $tutorial) {
//    return $app['twig']->render('tutorial.twig', [
//                'titulo' => 'Tutorial',
//                'categoria' => $categoria,
//                'tutorial' => $tutorial
//    ]);
//  }

}
