<?php

class Detalleactividad extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $idDetalle;

    /**
     *
     * @var integer
     */
    public $idActividad;

    /**
     *
     * @var string
     */
    public $nombreactividad;

    /**
     *
     * @var integer
     */
    public $dato;

    /**
     *
     * @var string
     */
    public $observacion;

    public function initialize()
    {
        $this->setSchema("cenopdb");
        $this->setSource("detalleactividad");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'detalleactividad';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Detalleactividad[]|Detalleactividad|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Detalleactividad|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
