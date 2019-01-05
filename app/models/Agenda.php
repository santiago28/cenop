<?php

class Agenda extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="IdAgenda", type="integer", length=11, nullable=false)
     */
    public $idAgenda;

    /**
     *
     * @var integer
     * @Column(column="IdPaciente", type="integer", length=11, nullable=false)
     */
    public $idPaciente;

    /**
     *
     * @var integer
     * @Column(column="IdOrtopedista", type="integer", length=11, nullable=false)
     */
    public $idOrtopedista;

    /**
     *
     * @var string
     * @Column(column="FechaCita", type="string", nullable=false)
     */
    public $fechaCita;

    /**
     *
     * @var string
     * @Column(column="HoraCita", type="string", nullable=false)
     */
    public $horaInicio;

    public $horaFin;

    public $motivo;

    public $tipo;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cenopdb");
        $this->setSource("agenda");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'agenda';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Agenda[]|Agenda|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Agenda|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
