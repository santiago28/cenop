<?php

class Carga extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Column(column="idCarga", type="integer", length=11, nullable=false)
     */
    public $idCarga;

    /**
     *
     * @var string
     * @Column(column="nombreArchivo", type="string", length=200, nullable=false)
     */
    public $nombreArchivo;

    /**
     *
     * @var string
     * @Column(column="fechaCarga", type="string", nullable=false)
     */
    public $fechaCarga;


    public $idOrden;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cenopdb");
        $this->setSource("carga");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'carga';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Carga[]|Carga|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Carga|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
