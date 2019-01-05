<?php

class Detalleingreso extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="idDetalle", type="integer", length=11, nullable=false)
     */
    public $idDetalle;

    /**
     *
     * @var string
     * @Column(column="nombreMaterial", type="string", length=100, nullable=true)
     */
    public $nombreMaterial;

    /**
     *
     * @var string
     * @Column(column="fechaIngreso", type="string", nullable=true)
     */
    public $fechaIngreso;

    /**
     *
     * @var string
     * @Column(column="lote", type="string", length=50, nullable=true)
     */
    public $lote;

    /**
     *
     * @var integer
     * @Column(column="estadoCalidad", type="integer", length=11, nullable=true)
     */
    public $estadoCalidad;

    /**
     *
     * @var string
     * @Column(column="fechaCaducidad", type="string", nullable=true)
     */
    public $fechaCaducidad;

    /**
     *
     * @var string
     * @Column(column="na", type="string", length=50, nullable=true)
     */
    public $na;

    /**
     *
     * @var integer
     * @Column(column="cantidadMateriales", type="integer", length=11, nullable=true)
     */
    public $cantidadMateriales;

    /**
     *
     * @var string
     * @Column(column="certificado", type="string", length=200, nullable=true)
     */
    public $certificado;

    /**
     *
     * @var string
     * @Column(column="informacionProveedor", type="string", length=300, nullable=true)
     */
    public $informacionProveedor;

    /**
     *
     * @var string
     * @Column(column="referencia", type="string", length=70, nullable=true)
     */
    public $referencia;

    /**
     *
     * @var string
     * @Column(column="recibe", type="string", length=100, nullable=true)
     */
    public $recibe;

    /**
     *
     * @var string
     * @Column(column="observaciones", type="string", nullable=true)
     */
    public $observaciones;

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
        $this->setSource("detalleingreso");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'detalleingreso';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Detalleingreso[]|Detalleingreso|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Detalleingreso|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
