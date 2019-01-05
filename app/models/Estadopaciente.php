<?php

class Estadopaciente extends \Phalcon\Mvc\Model
{

  public $idEstado;

  public $estado;

  public $fecha;

  public $idOrden;



  /**
  * Initialize method for model.
  */
  public function initialize()
  {
    $this->setSchema("cenopdb");
    $this->setSource("estadopaciente");
  }

  /**
  * Returns table name mapped in the model.
  *
  * @return string
  */
  public function getSource()
  {
    return 'estadopaciente';
  }

  /**
  * Allows to query a set of records that match the specified conditions
  *
  * @param mixed $parameters
  * @return Estadopaciente[]|Estadopaciente|\Phalcon\Mvc\Model\ResultSetInterface
  */
  public static function find($parameters = null)
  {
    return parent::find($parameters);
  }

  /**
  * Allows to query the first record that match the specified conditions
  *
  * @param mixed $parameters
  * @return Estadopaciente|\Phalcon\Mvc\Model\ResultInterface
  */
  public static function findFirst($parameters = null)
  {
    return parent::findFirst($parameters);
  }

}
