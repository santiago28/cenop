<?php
class IngresomateriaDTO
{
  /**
   *
   * @var integer
   * @Primary
   * @Identity
   * @Column(column="idIngreso", type="integer", length=11, nullable=false)
   */
  public $idIngreso;
  public $op;

  /**
   *
   * @var string
   * @Column(column="codigo", type="string", length=15, nullable=false)
   */
  public $codigo;

  /**
   *
   * @var integer
   * @Column(column="version", type="integer", length=11, nullable=false)
   */
  public $version;

  /**
   *
   * @var string
   * @Column(column="fecha", type="string", nullable=false)
   */
  public $fecha;

  /**
   *
   * @var integer
   * @Column(column="idOrden", type="integer", length=11, nullable=false)
   */
  public $idOrden;

  public $nombrePaciente;
}
 ?>
