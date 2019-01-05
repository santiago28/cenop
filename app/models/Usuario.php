<?php

class Usuario extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="idUsuario", type="integer", length=11, nullable=false)
     */
    public $idUsuario;

    /**
     *
     * @var string
     * @Column(column="nombreUsuario", type="string", length=25, nullable=false)
     */
    public $nombreUsuario;

    /**
     *
     * @var string
     * @Column(column="contrasena", type="string", length=50, nullable=false)
     */
    public $contrasena;

    /**
     *
     * @var string
     * @Column(column="correo", type="string", length=50, nullable=false)
     */
    public $correo;

    public $tipoUsuario;
    /**
     *
     * @var integer
     * @Column(column="estado", type="integer", length=11, nullable=false)
     */
    public $estado;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cenopdb");
        $this->setSource("usuario");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'usuario';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Usuario[]|Usuario|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Usuario|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
