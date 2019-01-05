<?php

class PacienteDTO
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

  public $nombreTipoDocumento;

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

  public $idDepartamento;

  public $nombreMunicipio;

  public $nombreDepartamento;

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




}
