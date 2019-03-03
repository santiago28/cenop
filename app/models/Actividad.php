<?php

class Actividad extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $idActividad;

    /**
     *
     * @var integer
     */
    public $idOrden;

    /**
     *
     * @var string
     */
    public $codigo;

    /**
     *
     * @var string
     */
    public $version;

    /**
     *
     * @var string
     */
    public $fecha;

    public $tipo;

    public function initialize()
    {
        $this->setSchema("cenopdb");
        $this->setSource("actividad");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'actividad';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Actividad[]|Actividad|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Actividad|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
