<?php


class Paciente extends \Phalcon\Mvc\Model
{

  /**
  *
  * @var integer
  * @Primary
  * @Identity
  * @Column(column="idPaciente", type="integer", length=11, nullable=false)
  */
  public $idPaciente;

  /**
  *
  * @var string
  * @Column(column="nombre", type="string", length=25, nullable=false)
  */
  public $nombre;

  /**
  *
  * @var string
  * @Column(column="apellido", type="string", length=25, nullable=false)
  */
  public $apellido;

  /**
  *
  * @var integer
  * @Column(column="tipoDocumento", type="integer", length=11, nullable=false)
  */
  public $tipoDocumento;

  /**
  *
  * @var string
  * @Column(column="numeroDocumento", type="string", length=15, nullable=false)
  */
  public $numeroDocumento;

  /**
  *
  * @var string
  * @Column(column="telefono", type="string", length=15, nullable=false)
  */
  public $telefono;

  /**
  *
  * @var string
  * @Column(column="celular", type="string", length=15, nullable=false)
  */
  public $celular;

  /**
  *
  * @var integer
  * @Column(column="idMunicipio", type="integer", length=11, nullable=false)
  */
  public $idMunicipio;

  /**
  *
  * @var string
  * @Column(column="direccion", type="string", length=25, nullable=false)
  */
  public $direccion;

  /**
  *
  * @var integer
  * @Column(column="edad", type="integer", length=11, nullable=false)
  */
  public $edad;

  /**
  *
  * @var double
  * @Column(column="estatura", type="double", nullable=false)
  */
  public $estatura;

  /**
  *
  * @var double
  * @Column(column="peso", type="double", nullable=false)
  */
  public $peso;

  /**
  *
  * @var integer
  * @Column(column="idUsuario", type="integer", length=11, nullable=false)
  */
  public $idUsuario;

  public $firma;

  /**
  * Initialize method for model.
  */
  public function initialize()
  {
    $this->setSchema("cenopdb");
    $this->setSource("paciente");
  }

  public function getMunicipio(){
    if ($this->idMunicipio != null) {
      $idMunicipio = $this->idMunicipio;
      $municipio = Municipio::findFirstByidMunicipio($idMunicipio);
      return $municipio->nombre;
    }
  }

  public function getTipoDocumento()
  {
    switch ($this->tipoDocumento) {
      case 1:
      return "Registro Civil";
      break;
      case 2:
      return "Tarjeta de Identidad";
      break;
      case 3:
      return "Cédula de Ciudadanía";
      break;
      default:
      # code...
      break;
    }
  }

  /**
  * Returns table name mapped in the model.
  *
  * @return string
  */
  public function getSource()
  {
    return 'paciente';
  }

  /**
  * Allows to query a set of records that match the specified conditions
  *
  * @param mixed $parameters
  * @return Paciente[]|Paciente|\Phalcon\Mvc\Model\ResultSetInterface
  */
  public static function find($parameters = null)
  {
    return parent::find($parameters);
  }

  /**
  * Allows to query the first record that match the specified conditions
  *
  * @param mixed $parameters
  * @return Paciente|\Phalcon\Mvc\Model\ResultInterface
  */
  public static function findFirst($parameters = null)
  {
    return parent::findFirst($parameters);
  }

}
