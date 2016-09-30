# ignacioFarreSilexWeb
Podeis verlo en funcionamiento en http://ignaciofarre.com/web

Proyecto personal de la web principal de Ignacio Farre.
Este proyecto está basado en el framework silex, con el que se está generando las rutas de la web, las vistas con twig y controlando los datos que recibe en formato json desde el gestor de contenidos.

en resumen, tengo un drupal 8 el cual lo utilizo como gestor de contenidos varios, para este proyecto en concreto, drupal está devolviendo datos en formato json, actuando como un servicio rest. Drupal 8 puede hacer esto desde sus vistas o bien desde sus controladores.

En un principio construí la web con angular recibiendo los datos directamente desde drupal, y quedó muy bien, pero el robot de google no indexa correctamente sus páginas, una vez analizado el problema, me decidí por construir la web en el servidor.

Para construir la web de forma sencilla he optado por silex que es un micro framework php, con el cual construyo la app en pocas lienas de configuración, ver web/index.php.
Con silex genero unas rutas con sus controladores y mando los datos necesarios a las vistas hechas con el motor de plantillas de twig 
