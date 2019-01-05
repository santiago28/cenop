<?php

use Phalcon\Mvc\User\Component;

/**
* Elements
*
* Ayudan para la construcción de los elementos UI de la aplicación
*/
class Elements extends Component
{
  public function getSelectTipoDocumento()
  {
    return array (
      '1' => 'Registro Civil',
      '2' => 'Tarjeta de Identidad',
      '3' => 'Cédula Ciudadanía',
    );
  }
}
