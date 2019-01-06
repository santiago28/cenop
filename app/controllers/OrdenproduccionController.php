<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class OrdenproduccionController extends ControllerBase
{
  public function initialize()
  {
    //$this->tag->setTitle("Permisos");
    $this->user = $this->session->get('auth');
    //$this->id_usuario = $this->user['id_usuario'];
    parent::initialize();
  }
  /**
  * Index action
  */
  public function indexAction()
  {
    if ($this->user["tipoUsuario"] == 2) {
      $empresa = Empresa::findFirstByidUsuario($this->user["idUsuario"]);
      $parameters = array(
        "idEmpresa" => $empresa->idEmpresa
      );
      $ordenproduccion = Ordenproduccion::find(array(
        "idEmpresa = :idEmpresa:",
        "bind" => $parameters,
        "order" => "op"
      ));
    }else {
      if ($this->user["tipoUsuario"] == 1) {
        $usuarioconsulta = Ortopedista::findFirstByidUsuario($this->user["idUsuario"]);
        if ($usuarioconsulta->idEmpresa == 1) {
          $ordenproduccion = Ordenproduccion::find(array(
            "order" => "op"
          ));
        }else {
          $parameters = array(
            "idEmpresa" => $usuarioconsulta->idEmpresa
          );
          $ordenproduccion = Ordenproduccion::find(array(
            "idEmpresa = :idEmpresa:",
            "bind" => $parameters,
            "order" => "op"
          ));
        }
      }else {
        $ordenproduccion = Ordenproduccion::find(array(
          "order" => "op"
        ));
      }

    }

    if (count($ordenproduccion) == 0) {
      $this->flash->notice("No se ha agregado ninguna órden de producción hasta el momento");
      $this->view->ordenproduccion = null;
    }
    $rows = array();
    foreach ($ordenproduccion as $orden) {
      $datosOrden = new OrdenproduccionDTO();
      $paciente = Paciente::findFirstByidPaciente($orden->idPaciente);
      $datosOrden->nombrePaciente = $paciente->nombre." ".$paciente->apellido;
      $datosOrden->numeroDocumento = $paciente->numeroDocumento;
      $datosOrden->idOrden = $orden->idOrden;
      $datosOrden->op = $orden->op;
      $datosOrden->fechaAutorizacion = $orden->fechaAutorizacion;
      $datosOrden->estadoPaciente = $orden->estadoPaciente;
      $datosOrden->idEmpresa = $orden->idEmpresa;
      array_push($rows, $datosOrden);
    }

    $estado = array(
      '1' => 'Valoración',
      '2' => 'Toma de medidas',
      '3' => 'Entrenamiento',
      '4' => 'Terminado',
      '5' => 'Entregado',
      '6' => 'Anulado'
    );

    $paciente = Paciente::find();
    $empresa = Empresa::find();
    $this->view->pacientes = $paciente;
    $this->view->empresas = $empresa;
    $this->view->ordenproduccion = $rows;
    $this->view->estadoPaciente = $estado;
    $this->view->tipoUsuario = $this->user["tipoUsuario"];


    $usuario = Ortopedista::findFirstByidUsuario($this->user["idUsuario"]);
    if ($usuario) {
      $this->view->tipoTecnico = $usuario->tipoTecnico;
    }else {
      $this->view->tipoTecnico = 0;
    }
    $listaempresas = array();
    foreach ($empresa as $key => $value) {
      if ($this->view->tipoUsuario == 0) {
        $listaempresas[$value->idEmpresa] = $value->nombre;
      }elseif ($this->view->tipoUsuario == 1) {
        if ($this->view->tipoTecnico == 1) {
          $listaempresas[$value->idEmpresa] = 'Contacto '.$value->nombreInterno;
        }elseif ($this->view->tipoTecnico == 2) {
          $listaempresas[$value->idEmpresa] = $value->nombre;
        }
      }else {
        $listaempresas[$value->idEmpresa] = $value->nombre;
      }
    }

    $this->view->listaempresas = $listaempresas;
  }

  public function GetListaOrtopedistasAction(){
    $this->view->disable();

    if ($this->request->isGet() == true && $this->request->isAjax() == true) {
      $tecnicos = Ortopedista::find(array(
        'tipoTecnico = 1'
      ));
      $rows = array();
      foreach ($tecnicos as $key => $value) {
        $tecnico = new Ortopedista;
        $tecnico->idOrtopedista = $value->idOrtopedista;
        $tecnico->nombre = $value->nombre.' '.$value->apellido;
        array_push($rows, $tecnico);
      }
      $this->response->setJsonContent($rows);
      $this->response->setStatusCode(200, "OK");
      $this->response->send();
    }
  }

  /**
  * Searches for ordenproduccion
  */
  public function searchAction()
  {
    $numberPage = 1;
    if ($this->request->isPost()) {
      $query = Criteria::fromInput($this->di, 'Ordenproduccion', $_POST);
      $this->persistent->parameters = $query->getParams();
    } else {
      $numberPage = $this->request->getQuery("page", "int");
    }

    $parameters = $this->persistent->parameters;
    if (!is_array($parameters)) {
      $parameters = [];
    }
    $parameters["order"] = "idOrden";

    $ordenproduccion = Ordenproduccion::find($parameters);
    if (count($ordenproduccion) == 0) {
      $this->flash->notice("The search did not find any ordenproduccion");

      $this->dispatcher->forward([
        "controller" => "ordenproduccion",
        "action" => "index"
      ]);

      return;
    }

    $paginator = new Paginator([
      'data' => $ordenproduccion,
      'limit'=> 10,
      'page' => $numberPage
    ]);

    $this->view->page = $paginator->getPaginate();
  }

  /**
  * Displays the creation form
  */
  public function newAction()
  {
    $this->assets->addCss("css/estilosorden.css");
    $this->assets->addJs("js/ordenproduccion.js");
  }

  /**
  * Edits a ordenproduccion
  *
  * @param string $idOrden
  */
  public function editAction($idOrden)
  {
    if (!$this->request->isPost()) {

      $ordenproduccion = Ordenproduccion::findFirstByidOrden($idOrden);
      if (!$ordenproduccion) {
        $this->flash->error("ordenproduccion was not found");

        $this->dispatcher->forward([
          'controller' => "ordenproduccion",
          'action' => 'index'
        ]);

        return;
      }

      $this->view->idOrden = $ordenproduccion->idOrden;
      $this->view->op = $ordenproduccion->op;
      $this->tag->setDefault("idOrden", $ordenproduccion->idOrden);
      $this->tag->setDefault("idEmpresa", $ordenproduccion->idEmpresa);
      $this->tag->setDefault("idPaciente", $ordenproduccion->idPaciente);
      $this->tag->setDefault("doctorRemite", $ordenproduccion->doctorRemite);
      $this->tag->setDefault("codigoLicencia", $ordenproduccion->codigoLicencia);
      $this->tag->setDefault("autorizacionServicio", $ordenproduccion->autorizacionServicio);
      $this->tag->setDefault("formula", $ordenproduccion->formula);
      $this->tag->setDefault("historiaClinica", $ordenproduccion->historiaClinica);
      $this->tag->setDefault("cedula", $ordenproduccion->cedula);
      $this->tag->setDefault("cedulaAcudiente", $ordenproduccion->cedulaAcudiente);
      $this->tag->setDefault("copa", $ordenproduccion->copa);
      $this->tag->setDefault("fechaAutorizacion", $ordenproduccion->fechaAutorizacion);
      $this->tag->setDefault("vencimientoAutorizacion", $ordenproduccion->vencimientoAutorizacion);
      $this->tag->setDefault("nroFactura", $ordenproduccion->nroFactura);
      $this->tag->setDefault("observaciones", $ordenproduccion->observaciones);
      $this->tag->setDefault("elaboro", $ordenproduccion->elaboro);
      $this->tag->setDefault("responsableAprobacion", $ordenproduccion->responsableAprobacion);
      $this->tag->setDefault("recibe", $ordenproduccion->recibe);
      $this->tag->setDefault("fechaRecibido", $ordenproduccion->fechaRecibido);
      $this->tag->setDefault("idEntrenamiento", $ordenproduccion->idEntrenamiento);
      $this->tag->setDefault("historiaClinicaTexto", $ordenproduccion->historiaClinicaTexto);
      $this->tag->setDefault("actaEntrega", $ordenproduccion->actaEntrega);
      $this->tag->setDefault("tipoOrtesis", $ordenproduccion->tipoOrtesis);
      $this->tag->setDefault("fechaAtencion", $ordenproduccion->fechaAtencion);
      $this->view->fechaAtencion = $ordenproduccion->fechaAtencion;
      //$this->tag->setDefault("tipoOrtesis", $ordenproduccion->tipoOrtesis);
      $empresa = Empresa::findFirstByidEmpresa($ordenproduccion->idEmpresa);

      $parameters = array(
        "idOrden" => $ordenproduccion->idOrden,
      );

      $parameters1 = array(
        "idPaciente" => $ordenproduccion->idPaciente,
        "tipo" => 2
      );

      $querymedida = Medidas::find(array(
        "idOrden = :idOrden:",
        "bind" => $parameters
      ));

      $querymateria = Materiaprima::find(array(
        "idOrden = :idOrden:",
        "bind" => $parameters
      ));

      $queryarchivos = Carga::find(array(
        "idOrden = :idOrden:",
        "bind" => $parameters
      ));

      $entrenamiento = Agenda::find(array(
        "idPaciente = :idPaciente: AND tipo = :tipo:",
        "bind" => $parameters1
      ));

      $tecnicos = Ortopedista::find(array(
        'tipoTecnico = 1'
      ));

      $listatecnicos = array();
      foreach ($tecnicos as $key => $value) {
        $listatecnicos[$value->idOrtopedista] = $value->nombre.' '.$value->apellido;
      }


      $rows = array();
      foreach ($entrenamiento as $cita) {
        $info = new AgendaDTO();
        $info->idPaciente = $cita->idPaciente;
        $info->idOrtopedista = $cita->idOrtopedista;
        $info->idAgenda = $cita->idAgenda;
        $info->fechaCita = $cita->fechaCita;
        $info->horaInicio = $cita->horaInicio;
        $info->horaFin = $cita->horaFin;
        $info->motivo = $cita->motivo;

        $paciente = Paciente::findFirstByidPaciente($cita->idPaciente);
        $info->nombrePaciente = $paciente->nombre . " " . $paciente->apellido;

        $ortopedista = Ortopedista::findFirstByidOrtopedista($cita->idOrtopedista);
        $info->nombreOrtopedista = $ortopedista->nombre . " " . $ortopedista->apellido;
        array_push($rows,$info);
      }
      //Tipo protesis
      $tipoOrtesis = array(
        '0' => 'Seleccione Tipo de Órtesis o Prótesis',
        '1' => 'Órtesis Calzado (huella plantar)',
        '2' => 'Órtesis Columna',
        '3' => 'Órtesis Ferula Milgran',
        '4' => 'Órtesis Miembro Inferior (huella plantar)',
        '5' => 'Órtesis Miembro Superior',
        '6' => 'Órtesis Sedentación',
        '7' => 'Prótesis Miembro Inferior Transfemoral (huella plantar)',
        '8' => 'Prótesis Transtibial (huella plantar)',
        '9' => 'Prótesis Miembro Superior',
        '10' => 'Órtesis Plantilla',
        '11' => 'Órtesis Insumo',
      );

      $usuario = Ortopedista::findFirstByidUsuario($this->user["idUsuario"]);
      $this->view->tiposOrtesis = $tipoOrtesis;
      $this->view->querymedida = $querymedida;
      $this->view->querymateria = $querymateria;
      $this->view->archivos = $queryarchivos;
      $ortopedistas = Ortopedista::find();
      $this->view->ortopedistas = $ortopedistas;
      $this->view->queryentrenamiento = $rows;
      $this->view->fotoFirma = $ordenproduccion->fotoFirma;
      $this->view->tipoUsuario = $this->user["tipoUsuario"];
      //$this->view->tecnicos = $tecnicos;
      $this->view->listatecnicos = $listatecnicos;
      if ($usuario) {
        $this->view->tipoTecnico = $usuario->tipoTecnico;
        $this->tag->setDefault("tipoTecnico", $usuario->tipoTecnico);
      }else {
        $this->view->tipoTecnico = 0;
      }
      if ($empresa) {
        $this->view->contacto = $empresa->nombre;
        if ($this->view->tipoUsuario == 0) {
          $this->view->contacto = $empresa->nombre;
        }elseif ($this->view->tipoUsuario == 1) {
          if ($this->view->tipoTecnico == 1) {
            $this->view->contacto = $empresa->nombreInterno;
          }elseif ($this->view->tipoTecnico == 2) {
            $this->view->contacto = $empresa->nombre;
          }
        }else {
          $this->view->contacto = $empresa->nombre;
        }
      }else {
        $this->view->contacto = "";
      }
      $this->assets->addCss("css/estilosorden.css");
      $this->assets->addJs("js/ordenproduccion.js");
    }
  }

  /**
  * Creates a new ordenproduccion
  */
  public function createAction()
  {
    if (!$this->request->isPost()) {
      $this->dispatcher->forward([
        'controller' => "ordenproduccion",
        'action' => 'index'
      ]);

      return;
    }

    $ordenproduccion = new Ordenproduccion();
    $ordenproduccion->idEmpresa = $this->request->getPost("idEmpresa");
    $ordenproduccion->idPaciente = $this->request->getPost("idPaciente");
    $ordenproduccion->doctorRemite = $this->request->getPost("doctorRemite");
    $ordenproduccion->codigoLicencia = $this->request->getPost("codigoLicencia");
    $ordenproduccion->autorizacionServicio = $this->request->getPost("autorizacionServicio");
    $ordenproduccion->formula = $this->request->getPost("formula");
    $ordenproduccion->historiaClinica = $this->request->getPost("historiaClinica");
    $ordenproduccion->cedula = $this->request->getPost("cedula");
    $ordenproduccion->actaEntrega = $this->request->getPost("actaEntrega");
    $ordenproduccion->cedulaAcudiente = $this->request->getPost("cedulaAcudiente");
    $ordenproduccion->copa = $this->request->getPost("copa");
    $ordenproduccion->fechaAutorizacion = $this->request->getPost("fechaAutorizacion");
    $ordenproduccion->vencimientoAutorizacion = $this->request->getPost("vencimientoAutorizacion");
    $ordenproduccion->nroFactura = $this->request->getPost("nroFactura");
    $ordenproduccion->elaboro = $this->request->getPost("elaboro");
    $ordenproduccion->responsableAprobacion = $this->request->getPost("responsableAprobacion");
    $ordenproduccion->recibe = $this->request->getPost("recibe");
    $ordenproduccion->fechaRecibido = $this->request->getPost("fechaRecibido");
    $ordenproduccion->idEntrenamiento = $this->request->getPost("idEntrenamiento");
    $ordenproduccion->historiaClinicaTexto = $this->request->getPost("historiaClinicaTexto");
    $ordenproduccion->observaciones = $this->request->getPost("observaciones");
    $ordenproduccion->fechaAtencion = date('Y-m-d');

    if ($this->request->getPost("op") == 0 || $this->request->getPost("op") == "") {
      $query = $this->db->query("SELECT * FROM ordenproduccion order by op desc LIMIT 1");
      $query->setFetchMode(Phalcon\Db::FETCH_OBJ);
      foreach ($query->fetchAll() as $key => $value) {
        $op =  $value->op;
      }
      $ordenproduccion->op = $op+1;
    }else {
      $ordenproduccion->op = $this->request->getPost("op");
    }




    if (!$ordenproduccion->save()) {
      foreach ($ordenproduccion->getMessages() as $message) {
        $this->flash->error($message);
      }

      $this->dispatcher->forward([
        'controller' => "ordenproduccion",
        'action' => 'new'
      ]);

      return;
    }

    $fechaActual = date('Y-m-d');
    $sqlingresomaterial = $this->db->query("INSERT INTO ingresomateria
      (
        idOrden,
        fecha
      )
      VALUES
      ('".$ordenproduccion->idOrden."',
        '".$fechaActual."')"
      );

      // $lastId = $this->db->lastInsertId();
      // $sqldetalleingreso = $this->db->query("INSERT INTO detalleingreso(idIngreso)VALUES('".$lastId."')");

      //materia prima
      $nombreMateria = $this->request->getPost("nombreMateria");
      $lote = $this->request->getPost("lote");
      $cantidad = $this->request->getPost("cantidad");
      $responsable = $this->request->getPost("responsable");
      $fechaMateria = $this->request->getPost("fechaMateria");
      $serial = $this->request->getPost("serial");

      for ($i=0; $i < count($nombreMateria);$i++) {
        $sql = $this->db->query("INSERT INTO materiaprima
          (
            idOrden,
            nombre,
            lote,
            cantidad,
            responsable,
            fecha,
            serial
          )
          VALUES
          ('".$ordenproduccion->idOrden."',
            '".$nombreMateria[$i]."',
            '".$lote[$i]."',
            '".$cantidad[$i]."',
            '".$responsable[$i]."',
            '".$fechaMateria[$i]."',
            '".$serial[$i]."')");
          }

          //medidas
          $nombreMedida = $this->request->getPost("nombreMedida");
          $medida = $this->request->getPost("medida");

          for ($i=0; $i < count($nombreMedida);$i++) {
            $sql = $this->db->query("INSERT INTO medidas
              (
                idOrden,
                nombreMedida,
                medida
              )
              VALUES
              ('".$ordenproduccion->idOrden."',
                '".$nombreMedida[$i]."',
                '".$medida[$i]."')");
              }

              //Seguimiento
              $fechaProceso = $this->request->getPost("fechaProceso");
              $responsableSeguimiento = $this->request->getPost("responsableSeguimiento");
              $calificacion =  $this->request->getPost("calificacion");

              for ($i=0; $i < count($calificacion);$i++) {
                if ($calificacion[$i] != "" && $fechaProceso[$i] != "") {
                  $sql = $this->db->query("INSERT INTO seguimientousuario
                    (
                      idOrden,
                      nombreActividad,
                      calificacion,
                      fechaProceso,
                      responsable
                    )
                    VALUES
                    ('".$ordenproduccion->idOrden."',
                      '".$i."',
                      '".$calificacion[$i]."',
                      '".$fechaProceso[$i]."',
                      '".$responsableSeguimiento[$i]."')");
                    }
                  }

                  $this->flash->success("ordenproduccion was created successfully");

                  return $this->response->redirect("ordenproduccion/edit/".$ordenproduccion->idOrden);
                }

                /**
                * Saves a ordenproduccion edited
                *
                */
                public function saveAction()
                {

                  if (!$this->request->isPost()) {
                    $this->dispatcher->forward([
                      'controller' => "ordenproduccion",
                      'action' => 'index'
                    ]);

                    return;
                  }

                  $idOrden = $this->request->getPost("idOrden");
                  $ordenproduccion = Ordenproduccion::findFirstByidOrden($idOrden);

                  if (!$ordenproduccion) {
                    $this->flash->error("ordenproduccion does not exist " . $idOrden);

                    $this->dispatcher->forward([
                      'controller' => "ordenproduccion",
                      'action' => 'index'
                    ]);

                    return;
                  }

                  //$ordenproduccion->idEmpresa = $this->request->getPost("idEmpresa");
                  $ordenproduccion->idPaciente = $this->request->getPost("idPaciente");
                  $ordenproduccion->doctorRemite = $this->request->getPost("doctorRemite");
                  $ordenproduccion->codigoLicencia = $this->request->getPost("codigoLicencia");
                  $ordenproduccion->autorizacionServicio = $this->request->getPost("autorizacionServicio");
                  $ordenproduccion->formula = $this->request->getPost("formula");
                  $ordenproduccion->historiaClinica = $this->request->getPost("historiaClinica");
                  $ordenproduccion->cedula = $this->request->getPost("cedula");
                  $ordenproduccion->cedulaAcudiente = $this->request->getPost("cedulaAcudiente");
                  $ordenproduccion->copa = $this->request->getPost("copa");
                  $ordenproduccion->fechaAutorizacion = $this->request->getPost("fechaAutorizacion");
                  $ordenproduccion->vencimientoAutorizacion = $this->request->getPost("vencimientoAutorizacion");
                  $ordenproduccion->nroFactura = $this->request->getPost("nroFactura");
                  $ordenproduccion->elaboro = $this->request->getPost("elaboro");
                  $ordenproduccion->responsableAprobacion = $this->request->getPost("responsableAprobacion");
                  $ordenproduccion->recibe = $this->request->getPost("recibe");
                  $ordenproduccion->fechaRecibido = $this->request->getPost("fechaRecibido");
                  $ordenproduccion->idEntrenamiento = $this->request->getPost("idEntrenamiento");
                  $ordenproduccion->historiaClinicaTexto = $this->request->getPost("historiaClinicaTexto");
                  $ordenproduccion->observaciones = $this->request->getPost("observaciones");
                  $ordenproduccion->tipoOrtesis = $this->request->getPost("tipoOrtesis");
                  $ordenproduccion->actaEntrega = $this->request->getPost("actaEntrega");
                  if ($ordenproduccion->fechaRecibido == "" || $ordenproduccion->fechaRecibido == "0000-00-00") {
                    $ordenproduccion->fechaRecibido = null;
                  }
                  if ($ordenproduccion->fechaAutorizacion == "" || $ordenproduccion->fechaAutorizacion == "0000-00-00") {
                    $ordenproduccion->fechaAutorizacion = null;
                  }
                  if ($ordenproduccion->vencimientoAutorizacion == "" || $ordenproduccion->vencimientoAutorizacion== "0000-00-00") {
                    $ordenproduccion->vencimientoAutorizacion = null;
                  }
                  if ($ordenproduccion->nroFactura == "" || $ordenproduccion->nroFactura == "0") {
                    $ordenproduccion->nroFactura = null;
                  }

                  if (!$ordenproduccion->save()) {

                    foreach ($ordenproduccion->getMessages() as $message) {
                      $this->flash->error($message);
                    }

                    $this->dispatcher->forward([
                      'controller' => "ordenproduccion",
                      'action' => 'edit',
                      'params' => [$ordenproduccion->idOrden]
                    ]);

                    return;
                  }


                  //materia prima
                  $idMateria = $this->request->getPost("idMateria");
                  $nombreMateria = $this->request->getPost("nombreMateria");
                  $lote = $this->request->getPost("lote");
                  $cantidad = $this->request->getPost("cantidad");
                  $responsable = $this->request->getPost("responsable");
                  $fechaMateria = $this->request->getPost("fechaMateria");
                  $serial = $this->request->getPost("serial");

                  for ($i=0; $i < count($nombreMateria);$i++) {
                    if (array_key_exists($i, $idMateria)) {
                      $sql = $this->db->query("UPDATE  materiaprima
                        SET
                        nombre='$nombreMateria[$i]',
                        lote='$lote[$i]',
                        cantidad='$cantidad[$i]',
                        responsable='$responsable[$i]',
                        fecha='$fechaMateria[$i]',
                        serial='$serial[$i]'
                        WHERE idMateria='$idMateria[$i]'");
                      } else {
                        $sql = $this->db->query("INSERT INTO materiaprima
                          (
                            idOrden,
                            nombre,
                            lote,
                            cantidad,
                            responsable,
                            fecha,
                            serial
                          )
                          VALUES
                          ('".$ordenproduccion->idOrden."',
                            '".$nombreMateria[$i]."',
                            '".$lote[$i]."',
                            '".$cantidad[$i]."',
                            '".$responsable[$i]."',
                            '".$fechaMateria[$i]."',
                            '".$serial[$i]."')");
                          }
                        }


                        //medidas
                        $idMedida = $this->request->getPost("idMedida");
                        $nombreMedida = $this->request->getPost("nombreMedida");
                        $medida = $this->request->getPost("medida");

                        for ($i=0; $i < count($nombreMedida);$i++) {
                          if (array_key_exists($i, $idMedida)) {
                            $sql = $this->db->query("UPDATE  medidas
                              SET
                              nombreMedida='$nombreMedida[$i]',
                              medida='$medida[$i]'
                              WHERE idMedida='$idMedida[$i]'");
                            }else {
                              $sql = $this->db->query("INSERT INTO medidas
                                (
                                  idOrden,
                                  nombreMedida,
                                  medida
                                )
                                VALUES
                                ('".$ordenproduccion->idOrden."',
                                  '".$nombreMedida[$i]."',
                                  '".$medida[$i]."')");
                                }
                              }

                              //Seguimiento
                              $fechaProceso = $this->request->getPost("fechaProceso");
                              $responsableSeguimiento = $this->request->getPost("responsableSeguimiento");
                              $calificacion =  $this->request->getPost("calificacion");
                              //$usuario = Ortopedista::findFirstByidUsuario($this->user["idUsuario"]);
                              $responsableSeguimiento = $this->request->getPost("responsableSeguimiento");
                              $cont = 0;
                              for ($i=0; $i < count($fechaProceso);$i++) {
                                if ($fechaProceso[$i] != "") {
                                  if (array_key_exists($i, $calificacion)) {
                                    $existe = $this->db->query("select * from seguimientousuario where nombreActividad = '$i' and idOrden = '$idOrden'");
                                    if ($existe->numRows() > 0) {
                                      $sql = $this->db->query("UPDATE seguimientousuario
                                        SET
                                        calificacion='$calificacion[$i]',
                                        fechaProceso='$fechaProceso[$i]',
                                        responsable='$responsableSeguimiento[$i]'
                                        WHERE nombreActividad='$i' AND idOrden='$idOrden'");
                                      }else {
                                        $sql = $this->db->query("INSERT INTO seguimientousuario
                                          (
                                            idOrden,
                                            nombreActividad,
                                            calificacion,
                                            fechaProceso,
                                            responsable
                                          )
                                          VALUES
                                          ('".$ordenproduccion->idOrden."',
                                            '".$i."',
                                            '".$calificacion[$i]."',
                                            '".$fechaProceso[$i]."',
                                            '".$responsableSeguimiento[$i]."')");
                                          }
                                          $cont++;
                                        }
                                      }
                                    }

                                    $this->flash->success("ordenproduccion was updated successfully");
                                    return $this->response->redirect("ordenproduccion/edit/".$ordenproduccion->idOrden);
                                  }

                                  /**
                                  * Deletes a ordenproduccion
                                  *
                                  * @param string $idOrden
                                  */

                                  public function deletemateriaAction($idMateria)
                                  {
                                    $materiaprima = Materiaprima::findFirstByidMateria($idMateria);
                                    $idOrden = $materiaprima->idOrden;
                                    if (!$materiaprima) {
                                      $this->flash->error("ordenproduccion was not found");

                                      $this->dispatcher->forward([
                                        'controller' => "ordenproduccion",
                                        'action' => 'index'
                                      ]);

                                      return;
                                    }

                                    if (!$materiaprima->delete()) {

                                      foreach ($materiaprima->getMessages() as $message) {
                                        $this->flash->error($message);
                                      }

                                      $this->dispatcher->forward([
                                        'controller' => "ordenproduccion",
                                        'action' => 'search'
                                      ]);

                                      return;
                                    }

                                    $this->flash->success("ordenproduccion was deleted successfully");
                                    return $this->response->redirect("ordenproduccion/edit/".$idOrden);
                                  }

                                  public function deleteAction($idOrden)
                                  {
                                    $ordenproduccion = Ordenproduccion::findFirstByidOrden($idOrden);
                                    if (!$ordenproduccion) {
                                      $this->flash->error("ordenproduccion was not found");

                                      $this->dispatcher->forward([
                                        'controller' => "ordenproduccion",
                                        'action' => 'index'
                                      ]);

                                      return;
                                    }

                                    if (!$ordenproduccion->delete()) {

                                      foreach ($ordenproduccion->getMessages() as $message) {
                                        $this->flash->error($message);
                                      }

                                      $this->dispatcher->forward([
                                        'controller' => "ordenproduccion",
                                        'action' => 'search'
                                      ]);

                                      return;
                                    }

                                    $this->flash->success("ordenproduccion was deleted successfully");
                                    return $this->response->redirect("ordenproduccion/index/");

                                  }

                                  public function createAgendaEntrenamientoAction()
                                  {
                                    if (!$this->request->isPost()) {
                                      $this->dispatcher->forward([
                                        'controller' => "agenda",
                                        'action' => 'new'
                                      ]);

                                      return;
                                    }

                                    $agenda = new Agenda();
                                    $idOrden = $this->request->getPost("idOrden");
                                    $agenda->idPaciente = $this->request->getPost("idPaciente");
                                    $agenda->idOrtopedista = $this->request->getPost("idOrtopedistaOrden");
                                    $agenda->fechaCita = $this->request->getPost("fechaCita");
                                    $agenda->horaInicio = $this->request->getPost("horaInicio");
                                    $agenda->horaFin = $this->request->getPost("horaFin");
                                    $agenda->motivo = $this->request->getPost("motivo");
                                    $agenda->tipo = 2;


                                    if (!$agenda->save()) {
                                      foreach ($agenda->getMessages() as $message) {
                                        $this->flash->error($message);
                                      }

                                      $this->dispatcher->forward([
                                        'controller' => "agenda",
                                        'action' => 'new'
                                      ]);

                                      return;
                                    }

                                    $this->flash->success("agenda was created successfully");

                                    return $this->response->redirect("ordenproduccion/edit/".$idOrden);
                                  }

                                  public function ActualizarEstadoOrdenAction()
                                  {
                                    $this->view->disable();
                                    if ($this->request->isPost() == true && $this->request->isAjax() == true) {
                                      $estadoPaciente = $this->request->get("estado");
                                      $idOrden = $this->request->get("orden");
                                      $sql = $this->db->query("UPDATE  ordenproduccion
                                        SET
                                        estadoPaciente='$estadoPaciente'
                                        WHERE op='$idOrden'");

                                        $query = $this->db->query("select * from estadopaciente
                                        where idOrden = '$idOrden' and estado = '$estadoPaciente'");
                                        $query->setFetchMode(Phalcon\Db::FETCH_OBJ);
                                        $rows = $query->numRows();
                                        if ($rows > 0) {
                                          foreach ($query->fetchAll() as $key => $value) {
                                            $estadosp = new Estadopaciente();
                                            $estadosp->fecha = $value->fecha;
                                          }
                                          $this->response->setJsonContent($estadosp);
                                          $this->response->setStatusCode(200, "OK");
                                          $this->response->send();
                                        }else {
                                          $this->response->setJsonContent("");
                                          $this->response->setStatusCode(200, "OK");
                                          $this->response->send();
                                        }


                                      }
                                    }

                                    public function CambiarClienteOrdenAction()
                                    {
                                      $this->view->disable();
                                      if ($this->request->isPost() == true && $this->request->isAjax() == true) {
                                        $idEmpresa = $this->request->get("idEmpresa");
                                        $idOrden = $this->request->get("orden");
                                        $sql = $this->db->query("UPDATE  ordenproduccion
                                          SET
                                          idEmpresa='$idEmpresa'
                                          WHERE op='$idOrden'");
                                          $this->response->setJsonContent("");
                                          $this->response->setStatusCode(200, "OK");
                                          $this->response->send();
                                        }
                                      }

                                      public function BuscarPacienteAction()
                                      {
                                        $this->view->disable();

                                        if ($this->request->isGet() == true && $this->request->isAjax() == true) {
                                          $numeroDocumento = $this->request->get("numeroDocumento");
                                          $pacienteconsulta = Paciente::findFirstBynumeroDocumento($numeroDocumento);
                                          if ($pacienteconsulta == false) {
                                            $this->response->setJsonContent(null);
                                            $this->response->setStatusCode(200, "OK");
                                            $this->response->send();
                                          }else {
                                            $paciente = new PacienteDTO();
                                            $paciente->idPaciente = $pacienteconsulta->idPaciente;
                                            $paciente->nombre = $pacienteconsulta->nombre;
                                            $paciente->apellido = $pacienteconsulta->apellido;
                                            $paciente->numeroDocumento = $pacienteconsulta->numeroDocumento;
                                            $paciente->tipoDocumento = $pacienteconsulta->tipoDocumento;
                                            $paciente->telefono = $pacienteconsulta->telefono;
                                            $paciente->celular = $pacienteconsulta->celular;
                                            $paciente->direccion = $pacienteconsulta->direccion;
                                            $paciente->edad = $pacienteconsulta->edad;
                                            $paciente->estatura = $pacienteconsulta->estatura;
                                            $paciente->peso = $pacienteconsulta->peso;
                                            $paciente->idUsuario = $pacienteconsulta->idUsuario;
                                            $paciente->idMunicipio = $pacienteconsulta->idMunicipio;

                                            $municipio = Municipio::findFirstByidMunicipio($paciente->idMunicipio);
                                            $departamento = Departamento::findFirstByidDepartamento($municipio->idDepartamento);

                                            $paciente->nombreMunicipio = $municipio->nombre;
                                            $paciente->nombreDepartamento = $departamento->nombre;

                                            $this->response->setJsonContent($paciente);
                                            $this->response->setStatusCode(200, "OK");
                                            $this->response->send();
                                          }
                                        }
                                      }


                                      public function EliminarCargaAction()
                                      {
                                        $this->view->disable();
                                        if ($this->request->isGet() == true && $this->request->isAjax() == true) {
                                          $idCarga =  $this->request->get("idCarga");
                                          $carga = Carga::findFirstByidCarga($idCarga);

                                          if (!$carga->delete()) {

                                          }
                                          $this->response->setJsonContent("OK");
                                          $this->response->setStatusCode(200, "OK");
                                          $this->response->send();
                                        }
                                      }

                                      public function BuscarDatosOrdenAction()
                                      {
                                        $this->view->disable();
                                        if ($this->request->isGet() == true && $this->request->isAjax() == true) {

                                          $idOrden =  $this->request->get("idOrden");
                                          $parameters = array(
                                            "idOrden" => $idOrden,
                                          );

                                          $queryseguimiento = Seguimientousuario::find(array(
                                            "colums" => "responsable, fechaProceso, nombreActividad, calificacion",
                                            "idOrden = :idOrden:",
                                            "bind" => $parameters
                                          ));

                                          //Info Paciente

                                          $datosOrden = Ordenproduccion::findFirstByidOrden($idOrden);
                                          $pacienteconsulta = Paciente::findFirstByidPaciente($datosOrden->idPaciente);

                                          $paciente = new PacienteDTO();
                                          $paciente->idPaciente = $pacienteconsulta->idPaciente;
                                          $paciente->nombre = $pacienteconsulta->nombre;
                                          $paciente->apellido = $pacienteconsulta->apellido;
                                          $paciente->numeroDocumento = $pacienteconsulta->numeroDocumento;
                                          $paciente->tipoDocumento = $pacienteconsulta->tipoDocumento;
                                          $paciente->telefono = $pacienteconsulta->telefono;
                                          $paciente->celular = $pacienteconsulta->celular;
                                          $paciente->direccion = $pacienteconsulta->direccion;
                                          $paciente->edad = $pacienteconsulta->edad;
                                          $paciente->estatura = $pacienteconsulta->estatura;
                                          $paciente->peso = $pacienteconsulta->peso;
                                          $paciente->idUsuario = $pacienteconsulta->idUsuario;
                                          $paciente->idMunicipio = $pacienteconsulta->idMunicipio;
                                          $paciente->nombreTipoDocumento = $datosOrden->getTipoDocumento($pacienteconsulta->tipoDocumento);

                                          $municipio = Municipio::findFirstByidMunicipio($paciente->idMunicipio);
                                          $departamento = Departamento::findFirstByidDepartamento($municipio->idDepartamento);

                                          $paciente->nombreMunicipio = $municipio->nombre;
                                          $paciente->nombreDepartamento = $departamento->nombre;

                                          $responsable = array();
                                          $fechaSeguimiento = array();
                                          $calificacion = array();
                                          $nombreActividad = array();
                                          foreach ($queryseguimiento as $key => $value) {
                                            $responsable[$key] = $value->responsable;
                                            $fechaSeguimiento[$key]  = $value->fechaProceso;
                                            $calificacion[$key] = $value->calificacion;
                                            $nombreActividad[$key] = $value->nombreActividad;
                                          }
                                          $datos =  array();
                                          $datos[0] = $responsable;
                                          $datos[1] = $fechaSeguimiento;
                                          $datos[2] = $calificacion;
                                          $datos[3] = $paciente;
                                          $datos[4] = $nombreActividad;
                                          $this->response->setJsonContent($datos);
                                          $this->response->setStatusCode(200, "OK");
                                          $this->response->send();
                                        }
                                      }

                                      public function SubirFirmaAction()
                                      {
                                        $idOrden = $this->request->getPost("idOrden");
                                        $orden = Ordenproduccion::findFirstByidOrden($idOrden);
                                        if ($this->request->hasFiles() == true) {
                                          $uploads = $this->request->getUploadedFiles();
                                          $isUploaded = false;

                                          foreach ($uploads as $upload) {
                                            $path = "files/".$upload->getname();
                                            $orden->fotoFirma = $upload->getname();
                                            ($upload->moveTo($path)) ? $isUploaded = true : $isUploaded = false;
                                          }
                                          if($isUploaded){

                                            if (!$orden->save()) {

                                              foreach ($ortopedista->getMessages() as $message) {
                                                $this->flash->error($message);
                                              }

                                              return $this->response->redirect("ordenproduccion/edit/".$idOrden);
                                            }

                                            $this->flash->success("La carga fue realizada exitosamente.");

                                            return $this->response->redirect("ordenproduccion/edit/".$idOrden);
                                          } else {
                                            $this->flash->error("Ocurrió un error al cargar los archivos");
                                            return $this->response->redirect("ordenproduccion/edit/".$idOrden);
                                          }
                                        }else {
                                          $this->flash->error("Debes de seleccionar los archivos");
                                          return $this->response->redirect("ordenproduccion/edit/".$idOrden);
                                        }
                                      }

                                      public function SubirArchivoAction()
                                      {
                                        $carga = new Carga();
                                        $carga->fechaCarga = date('Y-m-d');
                                        $carga->idOrden = $this->request->getPost("idOrden");

                                        if ($this->request->hasFiles() == true) {
                                          $uploads = $this->request->getUploadedFiles();
                                          $isUploaded = false;

                                          foreach ($uploads as $upload) {
                                            $path = "files/".$upload->getname();
                                            $carga->nombreArchivo = $upload->getname();
                                            ($upload->moveTo($path)) ? $isUploaded = true : $isUploaded = false;
                                          }
                                          if($isUploaded){
                                            if (!$carga->save()) {
                                              foreach ($carga->getMessages() as $message) {
                                                $this->flash->error($message);
                                              }

                                              return $this->response->redirect("ordenproduccion/edit/".$carga->idOrden);
                                            }

                                            $this->flash->success("La carga fue realizada exitosamente.");

                                            return $this->response->redirect("ordenproduccion/edit/".$carga->idOrden);
                                          } else {
                                            $this->flash->error("Ocurrió un error al cargar los archivos");
                                            return $this->response->redirect("ordenproduccion/edit/".$carga->idOrden);
                                          }
                                        }else {
                                          $this->flash->error("Debes de seleccionar los archivos");
                                          return $this->response->redirect("ordenproduccion/edit/".$carga->idOrden);
                                        }
                                      }

                                      public function GuardarFechaEstadoAction()
                                      {
                                        $this->view->disable();
                                        if ($this->request->isPost() == true && $this->request->isAjax() == true) {

                                          $estado = $this->request->get("estado");
                                          $idOrden = $this->request->get("idOrden");
                                          $fecha = $this->request->get("fecha");

                                          $query = $this->db->query("
                                          select * from estadopaciente
                                          where estado = '$estado'
                                          and idOrden = '$idOrden'");

                                          $query->setFetchMode(Phalcon\Db::FETCH_OBJ);
                                          $rows = $query->numRows();
                                          if ($rows > 0) {
                                            $sql = $this->db->query("UPDATE estadopaciente set fecha = '$fecha' WHERE idOrden = '$idOrden' and estado = '$estado'");
                                          }else {
                                            $estadoPaciente = new Estadopaciente();
                                            $estadoPaciente->idOrden =  $idOrden;
                                            $estadoPaciente->fecha = $fecha;
                                            $estadoPaciente->estado = $estado;

                                            if (!$estadoPaciente->save()) {
                                              foreach ($estadoPaciente->getMessages() as $message) {
                                                $this->flash->error($message);
                                              }
                                            }
                                          }
                                          $this->response->setJsonContent("OK");
                                          $this->response->setStatusCode(200, "OK");
                                          $this->response->send();

                                        }
                                      }

                                      public function ConsultarEstadosPacienteAction()
                                      {
                                        $this->view->disable();
                                        if ($this->request->isPost() == true && $this->request->isAjax() == true) {
                                          $idOrden = $this->request->get("idOrden");

                                          $parameters = array(
                                            "idOrden" => $idOrden,
                                          );

                                          $queryestado = Estadopaciente::find(array(
                                            "idOrden = :idOrden:",
                                            "bind" => $parameters,
                                            "order" => "estado asc"
                                          ));

                                          $rows = array();
                                          foreach ($queryestado as $estadosp) {
                                            $info = new Estadopaciente();
                                            $info->estado = $estadosp->estado;
                                            $info->fecha = $estadosp->fecha;
                                            $info->idOrden = $estadosp->idOrden;
                                            array_push($rows,$info);
                                          }
                                        }
                                        $this->response->setJsonContent($rows);
                                        $this->response->setStatusCode(200, "OK");
                                        $this->response->send();
                                      }

                                      public function ConsultaropxidAction()
                                      {
                                        $this->view->disable();
                                        if ($this->request->isPost() == true && $this->request->isAjax() == true) {
                                          $op = $this->request->get("op");
                                          $query = $this->db->query("
                                          select * from ordenproduccion
                                          where op = '$op'");
                                          $query->setFetchMode(Phalcon\Db::FETCH_OBJ);
                                          $rows = $query->numRows();
                                          if ($rows > 0) {
                                            $idOrden = "";
                                            foreach ($query->fetchAll() as $key => $value) {
                                              $idOrden = $value->idOrden;
                                            }
                                            $this->response->setJsonContent($idOrden);
                                            $this->response->setStatusCode(200, "OK");
                                            $this->response->send();
                                          }else {
                                            $this->response->setJsonContent(null);
                                            $this->response->setStatusCode(200, "OK");
                                            $this->response->send();
                                          }
                                        }
                                      }

                                      public function GenerarReporteOrtesisAction()
                                      {
                                        $this->view->disable();
                                        if ($this->request->isPost() == true && $this->request->isAjax() == true) {
                                          $fechaInicial = $this->request->get("fechaInicial");
                                          $fechaFinal = $this->request->get("fechaFinal");
                                          $estado = $this->request->get("estado");

                                          $query = $this->db->query("
                                          select o.tipoOrtesis, count(o.tipoOrtesis) as cantidad
                                          from ordenproduccion o join estadopaciente s
                                          on o.op = s.idOrden
                                          where s.estado = '$estado'
                                          and s.fecha BETWEEN '$fechaInicial' AND '$fechaFinal'
                                          group by o.tipoOrtesis");

                                          $query->setFetchMode(Phalcon\Db::FETCH_OBJ);
                                          $datos1 = array();
                                          $rows = $query->numRows();

                                          foreach ($query->fetchAll() as $key => $value) {
                                            $ReporteDTO = new ReporteDTO();
                                            $nombreProtesis = "";
                                            if ($value->tipoOrtesis != '0') {

                                              if ($value->tipoOrtesis == '1') {
                                                $nombreProtesis = "Órtesis Calzado (huella plantar)";
                                              }else if ($value->tipoOrtesis == '2') {
                                                $nombreProtesis = "Órtesis Columna";
                                              }else if ($value->tipoOrtesis == '3') {
                                                $nombreProtesis = "Órtesis Ferula Milgran";
                                              }else if ($value->tipoOrtesis == '4') {
                                                $nombreProtesis = "Órtesis Miembro Inferior (huella plantar)";
                                              }else if ($value->tipoOrtesis == '5') {
                                                $nombreProtesis = "Órtesis Miembro Superior";
                                              }else if ($value->tipoOrtesis == '6') {
                                                $nombreProtesis = "Órtesis Sedentación";
                                              }else if ($value->tipoOrtesis == '7') {
                                                $nombreProtesis = "Prótesis Miembro Inferior Transfemoral (huella plantar)";
                                              }else if ($value->tipoOrtesis == '8') {
                                                $nombreProtesis = "Prótesis Transtibial (huella plantar)";
                                              }else if ($value->tipoOrtesis == '9') {
                                                $nombreProtesis = "Prótesis Miembro Superior";
                                              }else if ($value->tipoOrtesis == '10') {
                                                $nombreProtesis = "Órtesis Plantilla";
                                              }else if ($value->tipoOrtesis == '11') {
                                                $nombreProtesis = "Órtesis Insumo";
                                              }
                                              $ReporteDTO->nombre = $nombreProtesis;
                                              $ReporteDTO->cantidad = $value->cantidad;
                                              $ReporteDTO->tipoOrtesis = $value->tipoOrtesis;
                                              $datos1[$key] = $ReporteDTO;
                                            }



                                          }
                                          $this->response->setJsonContent($datos1);
                                          $this->response->setStatusCode(200, "OK");
                                          $this->response->send();
                                        }
                                      }



                                    }
