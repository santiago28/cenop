<?php

class Seguimientousuario extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="idSeguimiento", type="integer", length=11, nullable=false)
     */
    public $idSeguimiento;

    /**
     *
     * @var integer
     * @Column(column="idOrden", type="integer", length=11, nullable=false)
     */
    public $idOrden;

    /**
     *
     * @var string
     * @Column(column="nombreActividad", type="string", length=100, nullable=false)
     */
    public $nombreActividad;

    /**
     *
     * @var string
     * @Column(column="calificacion", type="string", length=10, nullable=false)
     */
    public $calificacion;

    /**
     *
     * @var string
     * @Column(column="fechaProceso", type="string", nullable=false)
     */
    public $fechaProceso;

    /**
     *
     * @var string
     * @Column(column="responsable", type="string", length=100, nullable=false)
     */
    public $responsable;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cenopdb");
        $this->setSource("seguimientousuario");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'seguimientousuario';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Seguimientousuario[]|Seguimientousuario|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Seguimientousuario|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
