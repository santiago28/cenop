<?php

class Fuerzamuscular extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $idFuerza;

    /**
     *
     * @var integer
     */
    public $idValoracion;

    /**
     *
     * @var string
     */
    public $fuerza;

    /**
     *
     * @var string
     */
    public $calificacion;

    /**
     *
     * @var integer
     */
    public $tipo;

    public function initialize()
    {
        $this->setSchema("cenopdb");
        $this->setSource("fuerzamuscular");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'fuerzamuscular';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Fuerzamuscular[]|Fuerzamuscular|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Fuerzamuscular|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
