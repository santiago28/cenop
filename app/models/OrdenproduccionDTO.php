<?php
class OrdenproduccionDTO {
  /**
   *
   * @var integer
   * @Primary
   * @Identity
   * @Column(column="idOrden", type="integer", length=11, nullable=false)
   */
  public $idOrden;
  public $op;

  /**
   *
   * @var integer
   * @Column(column="idEmpresa", type="integer", length=11, nullable=true)
   */
  public $idEmpresa;

  public $estadoPaciente;

  /**
   *
   * @var integer
   * @Column(column="idPaciente", type="integer", length=11, nullable=false)
   */
  public $idPaciente;

  /**
   *
   * @var string
   * @Column(column="doctorRemite", type="string", length=40, nullable=true)
   */
  public $doctorRemite;

  /**
   *
   * @var string
   * @Column(column="codigoLicencia", type="string", length=15, nullable=true)
   */
  public $codigoLicencia;

  /**
   *
   * @var integer
   * @Column(column="autorizacionServicio", type="integer", length=11, nullable=true)
   */
  public $autorizacionServicio;

  /**
   *
   * @var integer
   * @Column(column="formula", type="integer", length=11, nullable=true)
   */
  public $formula;

  /**
   *
   * @var integer
   * @Column(column="historiaClinica", type="integer", length=11, nullable=true)
   */
  public $historiaClinica;

  /**
   *
   * @var string
   * @Column(column="cedula", type="string", length=12, nullable=true)
   */
  public $cedula;

  /**
   *
   * @var string
   * @Column(column="actaEntrega", type="string", length=12, nullable=true)
   */
  public $actaEntrega;

  /**
   *
   * @var string
   * @Column(column="cedulaAcudiente", type="string", length=12, nullable=true)
   */
  public $cedulaAcudiente;

  /**
   *
   * @var string
   * @Column(column="copa", type="string", length=15, nullable=true)
   */
  public $copa;

  /**
   *
   * @var string
   * @Column(column="fechaAutorizacion", type="string", nullable=true)
   */
  public $fechaAutorizacion;

  /**
   *
   * @var string
   * @Column(column="vencimientoAutorizacion", type="string", nullable=true)
   */
  public $vencimientoAutorizacion;

  /**
   *
   * @var integer
   * @Column(column="nroFactura", type="integer", length=11, nullable=true)
   */
  public $nroFactura;

  /**
   *
   * @var string
   * @Column(column="observaciones", type="integer", length=4000, nullable=true)
   */
  public $observaciones;

  /**
   *
   * @var integer
   * @Column(column="Elaboro", type="integer", length=11, nullable=true)
   */
  public $elaboro;

  /**
   *
   * @var integer
   * @Column(column="responsableAprobacion", type="integer", length=11, nullable=true)
   */
  public $responsableAprobacion;

  /**
   *
   * @var integer
   * @Column(column="recibe", type="integer", length=11, nullable=true)
   */
  public $recibe;

  /**
   *
   * @var string
   * @Column(column="fechaRecibido", type="string", nullable=true)
   */
  public $fechaRecibido;


  /**
   *
   * @var integer
   * @Column(column="idEntrenamiento", type="integer", length=11, nullable=true)
   */
  public $idEntrenamiento;

  /**
   *
   * @var string
   * @Column(column="historiaClinicaTexto", type="string", length=2000, nullable=true)
   */
  public $historiaClinicaTexto;

  public $nombrePaciete;



}
 ?>
