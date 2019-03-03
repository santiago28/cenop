<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class ValoracionController extends ControllerBase
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
    $listavaloracion = Valoracion::query()
    ->join("Ordenproduccion", "d.idOrden = Valoracion.idOrden", "d")
    ->orderBy('d.op')
    ->execute();
    $arraydatos = array();
    foreach ($listavaloracion as $valoracion) {
      $datosValoracion = new ValoracionDTO();
      $querypaciente = $this->db->query("select p.*
      from paciente p join ordenproduccion o on p.idPaciente = o.idPaciente
      where o.idOrden = '$valoracion->idOrden'");
      $querypaciente->setFetchMode(Phalcon\Db::FETCH_OBJ);
      foreach ($querypaciente->fetchAll() as $key => $value) {
        $datosValoracion->nombrePaciente = $value->nombre." ".$value->apellido;
      }
      $queryorden = $this->db->query("select * from ordenproduccion where idOrden = '$valoracion->idOrden'");
      $queryorden->setFetchMode(Phalcon\Db::FETCH_OBJ);
      foreach ($queryorden->fetchAll() as $key => $value) {
        $datosValoracion->op = $value->op;
      }
      $datosValoracion->idValoracion = $valoracion->idValoracion;
      $datosValoracion->codigo = $valoracion->codigo;
      $datosValoracion->version = $valoracion->version;
      $datosValoracion->fecha = $valoracion->fecha;
      $datosValoracion->idOrden = $valoracion->idOrden;

      array_push($arraydatos,$datosValoracion);
    }
    $this->view->listavaloracion = $arraydatos;
  }

  /**
  * Searches for valoracion
  */
  public function searchAction()
  {

    $numberPage = 1;
    if ($this->request->isPost()) {
      $query = Criteria::fromInput($this->di, "Valoracion", $_POST);
      $this->persistent->parameters = $query->getParams();
    } else {
      $numberPage = $this->request->getQuery("page", "int");
    }

    $parameters = $this->persistent->parameters;
    if (!is_array($parameters)) {
      $parameters = array();
    }
    $parameters["order"] = "idValoracion";

    $valoracion = Valoracion::find($parameters);
    if (count($valoracion) == 0) {
      $this->flash->notice("The search did not find any valoracion");

      return $this->dispatcher->forward(array(
        "controller" => "valoracion",
        "action" => "index"
      ));
    }

    $paginator = new Paginator(array(
      "data" => $valoracion,
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
  * Edits a valoracion
  *
  * @param string $idValoracion
  */
  public function editAction($idValoracion)
  {

    if (!$this->request->isPost()) {

      $valoracion = Valoracion::findFirstByidValoracion($idValoracion);
      if (!$valoracion) {
        $this->flash->error("valoracion was not found");

        return $this->dispatcher->forward(array(
          "controller" => "valoracion",
          "action" => "index"
        ));
      }

      $this->view->idValoracion = $valoracion->idValoracion;

      $this->tag->setDefault("idValoracion", $valoracion->idValoracion);
      $this->tag->setDefault("codigo", $valoracion->codigo);
      $this->tag->setDefault("version", $valoracion->version);
      $this->tag->setDefault("fechaversion", $valoracion->fechaversion);
      $this->tag->setDefault("fecha", $valoracion->fecha);
      $this->tag->setDefault("diagnostico", $valoracion->diagnostico);
      $this->tag->setDefault("antpersonales", $valoracion->antpersonales);
      $this->tag->setDefault("antfamiliares", $valoracion->antfamiliares);
      $this->tag->setDefault("fechaamputacion", $valoracion->fechaamputacion);
      $this->tag->setDefault("lado", $valoracion->lado);
      $this->tag->setDefault("nivelactividad", $valoracion->nivelactividad);
      $this->tag->setDefault("causaamputacion", $valoracion->causaamputacion);
      $this->tag->setDefault("formulamedica", $valoracion->formulamedica);
      $this->tag->setDefault("ayudaexterna", $valoracion->ayudaexterna);
      $this->tag->setDefault("cualayuda", $valoracion->cualayuda);
      $this->tag->setDefault("equilibrioestatico", $valoracion->equilibrioestatico);
      $this->tag->setDefault("equilibriodinamico", $valoracion->equilibriodinamico);
      $this->tag->setDefault("idOrtopedista", $valoracion->idOrtopedista);
      $this->tag->setDefault("dispositivomedico", $valoracion->dispositivomedico);
      $this->assets->addCss("css/estilosorden.css");

      $parameters1 = array(
        "idValoracion" => $valoracion->idValoracion,
        "tipo" => 1
      );

      $parameters2 = array(
        "idValoracion" => $valoracion->idValoracion,
        "tipo" => 2
      );


      $fuerza1 = Fuerzamuscular::find(array(
        "idValoracion = :idValoracion: AND tipo = :tipo:",
        "bind" => $parameters1
      ));

      $fuerza2 = Fuerzamuscular::find(array(
        "idValoracion = :idValoracion: AND tipo = :tipo:",
        "bind" => $parameters2
      ));

      $datos1 = array();
      foreach ($fuerza1 as $key => $value) {
        $datos1[$key] = $value->calificacion;
      }

      $datos2 = array();
      foreach ($fuerza2 as $key => $value) {
        $datos2[$key] = $value->calificacion;
      }

      $datosfuerza = array(
        '0' => '0',
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5'
      );

      $this->view->datosFuerza = $datosfuerza;
      $this->view->listafuerza1 = $datos1;
      $this->view->listafuerza2 = $datos2;
      $this->assets->addJs("js/valoracion.js");
    }
  }

  /**
  * Creates a new valoracion
  */
  public function createAction()
  {

    if (!$this->request->isPost()) {
      return $this->dispatcher->forward(array(
        "controller" => "valoracion",
        "action" => "index"
      ));
    }

    $valoracion = new Valoracion();

    $valoracion->idOrden = $this->request->getPost("idOrden");
    $valoracion->codigo = $this->request->getPost("codigo");
    $valoracion->version = $this->request->getPost("version");
    $valoracion->fechaversion = $this->request->getPost("fechaversion");
    $valoracion->fecha = $this->request->getPost("fecha");
    $valoracion->diagnostico = $this->request->getPost("diagnostico");
    $valoracion->antpersonales = $this->request->getPost("antpersonales");
    $valoracion->antfamiliares = $this->request->getPost("antfamiliares");
    $valoracion->fechaamputacion = $this->request->getPost("fechaamputacion");
    $valoracion->lado = $this->request->getPost("lado");
    $valoracion->nivelactividad = $this->request->getPost("nivelactividad");
    $valoracion->causaamputacion = $this->request->getPost("causaamputacion");
    $valoracion->formulamedica = $this->request->getPost("formulamedica");
    $valoracion->ayudaexterna = $this->request->getPost("ayudaexterna");
    $valoracion->cualayuda = $this->request->getPost("cualayuda");
    $valoracion->equilibrioestatico = $this->request->getPost("equilibrioestatico");
    $valoracion->equilibriodinamico = $this->request->getPost("equilibriodinamico");
    $valoracion->idOrtopedista = $this->request->getPost("idOrtopedista");


    if (!$valoracion->save()) {
      foreach ($valoracion->getMessages() as $message) {
        $this->flash->error($message);
      }

      return $this->dispatcher->forward(array(
        "controller" => "valoracion",
        "action" => "new"
      ));
    }

    $this->flash->success("valoracion was created successfully");

    return $this->dispatcher->forward(array(
      "controller" => "valoracion",
      "action" => "index"
    ));

  }

  /**
  * Saves a valoracion edited
  *
  */
  public function saveAction()
  {

    if (!$this->request->isPost()) {
      return $this->dispatcher->forward(array(
        "controller" => "valoracion",
        "action" => "index"
      ));
    }

    $idValoracion = $this->request->getPost("idValoracion");

    $valoracion = Valoracion::findFirstByidValoracion($idValoracion);
    if (!$valoracion) {
      $this->flash->error("valoracion does not exist " . $idValoracion);

      return $this->dispatcher->forward(array(
        "controller" => "valoracion",
        "action" => "index"
      ));
    }

    $valoracion->codigo = $this->request->getPost("codigo");
    $valoracion->version = $this->request->getPost("version");
    $valoracion->fechaversion = $this->request->getPost("fechaversion");
    $valoracion->fecha = $this->request->getPost("fecha");
    $valoracion->diagnostico = $this->request->getPost("diagnostico");
    $valoracion->antpersonales = $this->request->getPost("antpersonales");
    $valoracion->antfamiliares = $this->request->getPost("antfamiliares");
    $valoracion->fechaamputacion = $this->request->getPost("fechaamputacion");
    $valoracion->lado = $this->request->getPost("lado");
    $valoracion->nivelactividad = $this->request->getPost("nivelactividad");
    $valoracion->causaamputacion = $this->request->getPost("causaamputacion");
    $valoracion->formulamedica = $this->request->getPost("formulamedica");
    $valoracion->ayudaexterna = $this->request->getPost("ayudaexterna");
    $valoracion->cualayuda = $this->request->getPost("cualayuda");
    $valoracion->equilibrioestatico = $this->request->getPost("equilibrioestatico");
    $valoracion->equilibriodinamico = $this->request->getPost("equilibriodinamico");
    $valoracion->idOrtopedista = $this->request->getPost("idOrtopedista");
    $valoracion->dispositivomedico = $this->request->getPost("dispositivo");
    if ($valoracion->fechaversion == "" || $valoracion->fechaversion == "0000-00-00") {
      $valoracion->fechaversion = null;
    }
    if ($valoracion->fecha == "" || $valoracion->fecha == "0000-00-00") {
      $valoracion->fecha = null;
    }
    if ($valoracion->fechaamputacion == "" || $valoracion->fechaamputacion == "0000-00-00") {
      $valoracion->fechaamputacion = null;
    }
    if (!$valoracion->save()) {

      foreach ($valoracion->getMessages() as $message) {
        $this->flash->error($message);
      }
    }
    //rango
    $calificacionrango = $this->request->getPost("calificacion");
    $cont = 0;
    if ($calificacionrango != null) {
      for ($i=0; $i < 10;$i++) {
        if (array_key_exists($i, $calificacionrango)) {
          $existe = $this->db->query("select * from rangomovilidad where rango = '$i' and idValoracion = '$idValoracion'");
          if ($existe->numRows() > 0) {
            $sql =  $this->db->query("UPDATE rangomovilidad
              SET
              calificacion	='$calificacionrango[$i]'
              WHERE rango='$i' AND idValoracion='$idValoracion'");
            }else {
              $sql = $this->db->query("INSERT INTO rangomovilidad
                (
                  idValoracion,
                  rango,
                  calificacion
                )
                VALUES
                ('".$idValoracion."',
                  '".$i."',
                  '".$calificacionrango[$i]."')");
                }
                $cont++;
              }
            }

          }
          $fuerza1 = $this->request->getPost("fuerza1");
          $fuerza2 = $this->request->getPost("fuerza2");
          for ($i=0; $i < count($fuerza1);$i++) {
            $existe = $this->db->query("select * from fuerzamuscular where fuerza = '$i' and idValoracion = '$idValoracion' and tipo = '1'");
            if ($existe->numRows() > 0) {
              $sql = $this->db->query("UPDATE fuerzamuscular
                SET
                calificacion='$fuerza1[$i]'
                WHERE fuerza = '$i' and idValoracion = '$idValoracion' and tipo = '1'");
              }else {
                $sql = $this->db->query("INSERT INTO fuerzamuscular
                  (
                    idValoracion,
                    fuerza,
                    calificacion,
                    tipo
                  )
                  VALUES
                  ('".$idValoracion."',
                    '".$i."',
                    '".$fuerza1[$i]."',
                    '1')");
                  }
                }


                for ($i=0; $i < count($fuerza2);$i++) {
                  $existe = $this->db->query("select * from fuerzamuscular where fuerza = '$i' and idValoracion = '$idValoracion' and tipo = '2'");
                  if ($existe->numRows() > 0) {
                    $sql = $this->db->query("UPDATE fuerzamuscular
                      SET
                      calificacion='$fuerza2[$i]'
                      WHERE fuerza = '$i' and idValoracion = '$idValoracion' and tipo = '2'");
                    }else {
                      $sql = $this->db->query("INSERT INTO fuerzamuscular
                        (
                          idValoracion,
                          fuerza,
                          calificacion,
                          tipo
                        )
                        VALUES
                        ('".$idValoracion."',
                          '".$i."',
                          '".$fuerza2[$i]."',
                          '2')");
                        }
                      }


                      $this->flash->success("detalleactividad was updated successfully");
                      return $this->response->redirect("valoracion/edit/".$idValoracion);
                    }

                    public function BuscarDatosValoracionAction()
                    {
                      $this->view->disable();
                      if ($this->request->isGet() == true && $this->request->isAjax() == true) {
                        $idValoracion =  $this->request->get("idValoracion");
                        $parameters = array(
                          "idValoracion" => $idValoracion,
                        );

                        $queryvaloracion = Rangomovilidad::find(array(
                          "colums" => "rango, calificacion",
                          "idValoracion = :idValoracion:",
                          "bind" => $parameters
                        ));
                        $calificacion = array();
                        $rango = array();
                        foreach ($queryvaloracion as $key => $value) {
                          $calificacion[$key] = $value->calificacion;
                          $rango[$key] = $value->rango;
                        }
                        $datos = array();
                        $datos[0] = $rango;
                        $datos[1] = $calificacion;
                        $this->response->setJsonContent($datos);
                        $this->response->setStatusCode(200, "OK");
                        $this->response->send();
                      }
                    }

                    /**
                    * Deletes a valoracion
                    *
                    * @param string $idValoracion
                    */
                    public function deleteAction($idValoracion)
                    {

                      $valoracion = Valoracion::findFirstByidValoracion($idValoracion);
                      if (!$valoracion) {
                        $this->flash->error("valoracion was not found");

                        return $this->dispatcher->forward(array(
                          "controller" => "valoracion",
                          "action" => "index"
                        ));
                      }

                      if (!$valoracion->delete()) {

                        foreach ($valoracion->getMessages() as $message) {
                          $this->flash->error($message);
                        }

                        return $this->dispatcher->forward(array(
                          "controller" => "valoracion",
                          "action" => "search"
                        ));
                      }

                      $this->flash->success("valoracion was deleted successfully");

                      return $this->dispatcher->forward(array(
                        "controller" => "valoracion",
                        "action" => "index"
                      ));
                    }

                  }
