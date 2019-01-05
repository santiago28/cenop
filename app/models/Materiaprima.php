<?php

class Materiaprima extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="idMateria", type="integer", length=11, nullable=false)
     */
    public $idMateria;

    /**
     *
     * @var integer
     * @Column(column="idOrden", type="integer", length=11, nullable=false)
     */
    public $idOrden;

    /**
     *
     * @var integer
     * @Column(column="nombre", type="integer", length=11, nullable=false)
     */
    public $nombre;

    /**
     *
     * @var integer
     * @Column(column="lote", type="integer", length=11, nullable=false)
     */
    public $lote;

    /**
     *
     * @var integer
     * @Column(column="cantidad", type="integer", length=11, nullable=false)
     */
    public $cantidad;

    /**
     *
     * @var integer
     * @Column(column="responsable", type="integer", length=11, nullable=false)
     */
    public $responsable;

    /**
     *
     * @var integer
     * @Column(column="fecha", type="integer", length=11, nullable=false)
     */
    public $fecha;

    /**
     *
     * @var integer
     * @Column(column="serial", type="integer", length=11, nullable=false)
     */
    public $serial;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cenopdb");
        $this->setSource("materiaprima");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'materiaprima';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Materiaprima[]|Materiaprima|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Materiaprima|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
