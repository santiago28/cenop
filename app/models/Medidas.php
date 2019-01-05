<?php

class Medidas extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="idMedida", type="integer", length=11, nullable=false)
     */
    public $idMedida;

    /**
     *
     * @var integer
     * @Column(column="idOrden", type="integer", length=11, nullable=false)
     */
    public $idOrden;

    /**
     *
     * @var string
     * @Column(column="nombreMedida", type="string", length=50, nullable=false)
     */
    public $nombreMedida;

    /**
     *
     * @var string
     * @Column(column="medida", type="string", length=15, nullable=false)
     */
    public $medida;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cenopdb");
        $this->setSource("medidas");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'medidas';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Medidas[]|Medidas|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Medidas|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
