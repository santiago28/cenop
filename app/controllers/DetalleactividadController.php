<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class DetalleactividadController extends ControllerBase
{
  public function initialize()
  {
    //$this->tag->setTitle("Permisos");
    //$this->id_usuario = $this->user['id_usuario'];
    $this->user = $this->session->get('auth');

    parent::initialize();
  }
  /**
  * Index action
  */
  public function indexAction()
  {
    $listaactividad = Actividad::query()
    ->join("Ordenproduccion", "d.idOrden = Actividad.idOrden", "d")
    ->orderBy('d.op')
    ->execute();
    $arraydatos = array();
    foreach ($listaactividad as $actividad) {
      $datosActividad = new ActividadDTO();
      $querypaciente = $this->db->query("select p.*
      from paciente p join ordenproduccion o on p.idPaciente = o.idPaciente
      where o.idOrden = '$actividad->idOrden'");
      $querypaciente->setFetchMode(Phalcon\Db::FETCH_OBJ);
      foreach ($querypaciente->fetchAll() as $key => $value) {
        $datosActividad->nombrePaciente = $value->nombre." ".$value->apellido;
      }
      $queryorden = $this->db->query("select * from ordenproduccion where idOrden = '$actividad->idOrden'");
      $queryorden->setFetchMode(Phalcon\Db::FETCH_OBJ);
      foreach ($queryorden->fetchAll() as $key => $value) {
        $datosActividad->op = $value->op;
      }
      $datosActividad->idActividad = $actividad->idActividad;
      $datosActividad->codigo = $actividad->codigo;
      $datosActividad->version = $actividad->version;
      $datosActividad->fecha = $actividad->fecha;
      $datosActividad->idOrden = $actividad->idOrden;

      array_push($arraydatos,$datosActividad);
    }
    $this->view->listaactividad = $arraydatos;
  }

  /**
  * Searches for detalleactividad
  */
  public function searchAction()
  {

    $numberPage = 1;
    if ($this->request->isPost()) {
      $query = Criteria::fromInput($this->di, "Detalleactividad", $_POST);
      $this->persistent->parameters = $query->getParams();
    } else {
      $numberPage = $this->request->getQuery("page", "int");
    }

    $parameters = $this->persistent->parameters;
    if (!is_array($parameters)) {
      $parameters = array();
    }
    $parameters["order"] = "idDetalle";

    $detalleactividad = Detalleactividad::find($parameters);
    if (count($detalleactividad) == 0) {
      $this->flash->notice("The search did not find any detalleactividad");

      return $this->dispatcher->forward(array(
        "controller" => "detalleactividad",
        "action" => "index"
      ));
    }

    $paginator = new Paginator(array(
      "data" => $detalleactividad,
      "limit"=> 10,
      "page" => $numberPage
    ));

    $this->view->page = $paginator->getPaginate();
  }

  /**
  * Displays the creation form
  */
  public function newAction()
  {

  }

  /**
  * Edits a detalleactividad
  *
  * @param string $idDetalle
  */
  public function editAction($idActividad)
  {
    if (!$this->request->isPost()) {
      $parameters = array(
        "idActividad" => $idActividad,
      );

      $detalleactividad = Detalleactividad::find(array(
        "idActividad = :idActividad:",
        "bind" => $parameters
      ));

      $actividad = Actividad::findFirstByidActividad($idActividad);
      $ordenproduccion = Ordenproduccion::findFirstByidOrden($actividad->idOrden);

      $this->view->op = $ordenproduccion->op;
      $this->view->idActividad = $idActividad;
      $this->view->detalleactividad = $detalleactividad;
      $this->view->firma1 = $actividad->firma1;
      $this->view->firma2 = $actividad->firma2;
      $this->view->firma3 = $actividad->firma3;
      $this->view->firma4 = $actividad->firma4;
      $this->view->firma5 = $actividad->firma5;
      $this->view->firma6 = $actividad->firma6;
      $this->tag->setDefault("codigo", $actividad->codigo);
      $this->tag->setDefault("version", $actividad->version);
      $this->tag->setDefault("fecha", $actividad->fecha);
      $this->tag->setDefault("idActividad", $idActividad);
      $this->tag->setDefault("idOrden", $ordenproduccion->idOrden);
      $this->tag->setDefault("tipo", $actividad->tipo);
      $this->tag->setDefault("idPaciente", $ordenproduccion->idPaciente);
    }
    $this->assets->addCss("css/estilosorden.css");
    $this->assets->addJs("js/detalleactividad.js");
  }

  /**
  * Creates a new detalleactividad
  */
  public function createAction()
  {

    if (!$this->request->isPost()) {
      return $this->dispatcher->forward(array(
        "controller" => "detalleactividad",
        "action" => "index"
      ));
    }

    $detalleactividad = new Detalleactividad();

    $detalleactividad->idActividad = $this->request->getPost("idActividad");
    $detalleactividad->nombreactividad = $this->request->getPost("nombreactividad");
    $detalleactividad->dato = $this->request->getPost("dato");
    $detalleactividad->observacion = $this->request->getPost("observacion");


    if (!$detalleactividad->save()) {
      foreach ($detalleactividad->getMessages() as $message) {
        $this->flash->error($message);
      }

      return $this->dispatcher->forward(array(
        "controller" => "detalleactividad",
        "action" => "new"
      ));
    }

    $this->flash->success("detalleactividad was created successfully");

    return $this->dispatcher->forward(array(
      "controller" => "detalleactividad",
      "action" => "index"
    ));

  }

  /**
  * Saves a detalleactividad edited
  *
  */
  public function saveAction()
  {

    if (!$this->request->isPost()) {
      return $this->dispatcher->forward(array(
        "controller" => "detalleactividad",
        "action" => "index"
      ));
    }

    $idActividad = $this->request->getPost("idActividad");
    $codigo = $this->request->getPost("codigo");
    $version = $this->request->getPost("version");
    $fecha = $this->request->getPost("fecha");
    $tipo = $this->request->getPost("tipo");

    if ($fecha == "" || $fecha == "0000-00-00") {
      $fecha = null;
    }

    $sqlactividad =  $this->db->query("UPDATE actividad
      SET
      codigo='$codigo',
      version='$version',
      fecha='$fecha',
      tipo='$tipo'
      WHERE idActividad='$idActividad'");

      //detalle actividad
      $calificacion = $this->request->getPost("calificacion");
      $observacion = $this->request->getPost("observacion");

      $cont = 0;
      for ($i=0; $i < count($observacion);$i++) {
        if (array_key_exists($i, $calificacion)) {
          $existe = $this->db->query("select * from detalleactividad where nombreactividad = '$i' and idActividad = '$idActividad'");
          if ($existe->numRows() > 0) {
            $sql =  $this->db->query("UPDATE detalleactividad
              SET
              dato='$calificacion[$i]',
              observacion='$observacion[$i]'
              WHERE nombreactividad='$i' AND idActividad='$idActividad'");
            }else {
              $sql = $this->db->query("INSERT INTO detalleactividad
                (
                  idActividad,
                  nombreactividad,
                  dato,
                  observacion
                )
                VALUES
                ('".$idActividad."',
                  '".$i."',
                  '".$calificacion[$i]."',
                  '".$observacion[$i]."')");
                }
                $cont++;
              }
            }
            $this->flash->success("detalleactividad was updated successfully");
            return $this->response->redirect("detalleactividad/edit/".$idActividad);
          }

          public function BuscarDatosActividadAction()
          {
            $this->view->disable();
            if ($this->request->isGet() == true && $this->request->isAjax() == true) {
              $idActividad =  $this->request->get("idActividad");
              $parameters = array(
                "idActividad" => $idActividad,
              );

              $querydetalleactividad = Detalleactividad::find(array(
                "colums" => "nombreActividad, dato, observacion",
                "idActividad = :idActividad:",
                "bind" => $parameters
              ));

              $dato = array();
              $observacion = array();
              $nombreActividad = array();
              foreach ($querydetalleactividad as $key => $value) {
                $dato[$key] = $value->dato;
                $observacion[$key]  = $value->observacion;
                $nombreActividad[$key] = $value->nombreactividad;
              }
              $datos =  array();
              $datos[0] = $dato;
              $datos[1] = $observacion;
              $datos[2] = $nombreActividad;
              $this->response->setJsonContent($datos);
              $this->response->setStatusCode(200, "OK");
              $this->response->send();
            }
          }

          /**
          * Deletes a detalleactividad
          *
          * @param string $idDetalle
          */
          public function deleteAction($idDetalle)
          {

            $detalleactividad = Detalleactividad::findFirstByidDetalle($idDetalle);
            if (!$detalleactividad) {
              $this->flash->error("detalleactividad was not found");

              return $this->dispatcher->forward(array(
                "controller" => "detalleactividad",
                "action" => "index"
              ));
            }

            if (!$detalleactividad->delete()) {

              foreach ($detalleactividad->getMessages() as $message) {
                $this->flash->error($message);
              }

              return $this->dispatcher->forward(array(
                "controller" => "detalleactividad",
                "action" => "search"
              ));
            }

            $this->flash->success("detalleactividad was deleted successfully");

            return $this->dispatcher->forward(array(
              "controller" => "detalleactividad",
              "action" => "index"
            ));
          }

          public function GuardarFirmaAction()
          {
            $this->view->disable();
            if ($this->request->isPost() == true && $this->request->isAjax() == true) {
              $idPaciente =  $this->request->get("idPaciente");
              $numero =  $this->request->get("numero");
              $paciente = Paciente::findFirstByidPaciente($idPaciente);
              $idActividad = $this->request->get("idActividad");
              $actividad = Actividad::findFirstByidActividad($idActividad);
              $sql =  $this->db->query("UPDATE actividad
                SET
                firma$numero='$paciente->firma'
                WHERE  idActividad='$actividad->idActividad'");
                $this->response->setJsonContent("OK");
                $this->response->setStatusCode(200, "OK");
                $this->response->send();
              }
            }

          }
