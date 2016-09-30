
/**
 * Función de apollo para hacer tareas varias
 */
function Helper() {
  this.myHeight = 0;
  this.myWidth = 0;
  this.altura = 1000;

  this.windowHeight = function () {
    if (typeof (window.innerWidth) == 'number') {
      this.myHeight = window.innerHeight;
    } else if (document.documentElement && (document.documentElement.clientHeight)) {
      this.myHeight = document.documentElement.clientHeight;
    } else if (document.body && (document.body.clientHeight)) {
      this.myHeight = document.body.clientHeight;
    }
    return this.myHeight;
  };

  this.windowWidth = function () {
    if (typeof (window.innerWidth) == 'number') {
      this.myWidth = window.innerWidth;
    } else if (document.documentElement && (document.documentElement.clientWidth)) {
      this.myWidth = document.documentElement.clientWidth;
    } else if (document.body && (document.body.clientWidth)) {
      this.myWidth = document.body.clientWidth;
    }
    return this.myWidth;
  };

  this.getAturaParaBloques = function () {
    this.windowHeight();
    if (this.myHeight < 1050) {
      this.altura = this.myHeight - 50;
    }
    return this.altura;
  };
}

/**
 * Iniciamos el programa
 */
$(document).ready(function () {

  //Vamos a ver la altura del navegador para dividir las secciones.
  var helper = new Helper();
  $('.seccionAlturaNavegador').css({'height': helper.getAturaParaBloques()});



});
