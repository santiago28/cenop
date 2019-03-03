<?php

class AgendaDTO {
  /**
   *
   * @var integer
   * @Primary
   * @Identity
   * @Column(column="IdAgenda", type="integer", length=11, nullable=false)
   */
  public $idAgenda;

  public $op;
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

  public $nombrePaciente;

  public $nombreOrtopedista;
  
  public $nombreEmpresa;
}
 ?>
