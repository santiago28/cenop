<?php

class Valoracion extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $idValoracion;

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
    public $fechaversion;

    /**
     *
     * @var string
     */
    public $fecha;

    /**
     *
     * @var string
     */
    public $diagnostico;

    /**
     *
     * @var string
     */
    public $antpersonales;

    /**
     *
     * @var string
     */
    public $antfamiliares;

    /**
     *
     * @var string
     */
    public $fechaamputacion;

    /**
     *
     * @var integer
     */
    public $lado;

    /**
     *
     * @var integer
     */
    public $nivelactividad;

    /**
     *
     * @var string
     */
    public $causaamputacion;

    /**
     *
     * @var string
     */
    public $formulamedica;

    /**
     *
     * @var string
     */
    public $ayudaexterna;

    /**
     *
     * @var string
     */
    public $cualayuda;

    /**
     *
     * @var string
     */
    public $equilibrioestatico;

    /**
     *
     * @var string
     */
    public $equilibriodinamico;

    /**
     *
     * @var integer
     */
    public $idOrtopedista;

    public $dispositivomedico;

    public function initialize()
    {
        $this->setSchema("cenopdb");
        $this->setSource("valoracion");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'valoracion';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Valoracion[]|Valoracion|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Valoracion|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }
}
