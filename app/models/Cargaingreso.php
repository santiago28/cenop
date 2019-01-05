<?php

class Cargaingreso extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
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

    /**
     *
     * @var integer
     * @Column(column="idIngreso", type="integer", length=11, nullable=false)
     */
    public $idIngreso;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cenopdb");
        $this->setSource("cargaingreso");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cargaingreso';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Cargaingreso[]|Cargaingreso|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Cargaingreso|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
