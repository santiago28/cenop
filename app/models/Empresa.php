<?php

class Empresa extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="idEmpresa", type="integer", length=11, nullable=false)
     */
    public $idEmpresa;

    /**
     *
     * @var string
     * @Column(column="nombre", type="string", length=30, nullable=false)
     */
    public $nombre;

    public $nombreInterno;

    /**
     *
     * @var string
     * @Column(column="nit", type="string", length=20, nullable=false)
     */
    public $nit;

    /**
     *
     * @var integer
     * @Column(column="idMunicipio", type="integer", length=11, nullable=false)
     */
    public $idMunicipio;

    /**
     *
     * @var integer
     * @Column(column="telefono", type="integer", length=11, nullable=false)
     */
    public $telefono;

    /**
     *
     * @var string
     * @Column(column="representanteLegal", type="string", length=40, nullable=false)
     */
    public $representanteLegal;

    public $idUsuario;

    public $cedulaRepresentante;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cenopdb");
        $this->setSource("empresa");
    }

    public function getMunicipio(){
      $idMunicipio = $this->idMunicipio;
      $municipio = Municipio::findFirstByidMunicipio($idMunicipio);
      return $municipio->nombre;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'empresa';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Empresa[]|Empresa|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Empresa|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
