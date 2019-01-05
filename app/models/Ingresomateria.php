<?php

class Ingresomateria extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="idIngreso", type="integer", length=11, nullable=false)
     */
    public $idIngreso;

    /**
     *
     * @var string
     * @Column(column="codigo", type="string", length=15, nullable=false)
     */
    public $codigo;

    /**
     *
     * @var integer
     * @Column(column="version", type="integer", length=11, nullable=false)
     */
    public $version;

    /**
     *
     * @var string
     * @Column(column="fecha", type="string", nullable=false)
     */
    public $fecha;

    /**
     *
     * @var integer
     * @Column(column="idOrden", type="integer", length=11, nullable=false)
     */
    public $idOrden;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cenopdb");
        $this->setSource("ingresomateria");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ingresomateria';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Ingresomateria[]|Ingresomateria|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Ingresomateria|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
