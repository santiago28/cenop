<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class DetalleingresoController extends ControllerBase
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
    $ingresomateria = Ingresomateria::query()
    ->join("Ordenproduccion", "d.idOrden = Ingresomateria.idOrden", "d")
    ->orderBy('d.op')
    ->execute();
    $arraydatos = array();
    foreach ($ingresomateria as $ingreso) {
      $datosIngreso = new IngresomateriaDTO();
      $querypaciente = $this->db->query("select p.*
      from paciente p join ordenproduccion o on p.idPaciente = o.idPaciente
      where o.idOrden = '$ingreso->idOrden'");
      $querypaciente->setFetchMode(Phalcon\Db::FETCH_OBJ);
      foreach ($querypaciente->fetchAll() as $key => $value) {
        $datosIngreso->nombrePaciente = $value->nombre." ".$value->apellido;
      }
      $queryorden = $this->db->query("select * from ordenproduccion where idOrden = '$ingreso->idOrden'");
      $queryorden->setFetchMode(Phalcon\Db::FETCH_OBJ);
      foreach ($queryorden->fetchAll() as $key => $value) {
        $datosIngreso->op = $value->op;
      }
      $datosIngreso->idIngreso = $ingreso->idIngreso;
      $datosIngreso->codigo = $ingreso->codigo;
      $datosIngreso->version = $ingreso->version;
      $datosIngreso->fecha = $ingreso->fecha;
      $datosIngreso->idOrden = $ingreso->idOrden;

      array_push($arraydatos,$datosIngreso);
    }
    $this->view->ingresomateria = $arraydatos;
  }

  /**
  * Searches for detalleingreso
  */
  public function searchAction()
  {
    $numberPage = 1;
    if ($this->request->isPost()) {
      $query = Criteria::fromInput($this->di, 'Detalleingreso', $_POST);
      $this->persistent->parameters = $query->getParams();
    } else {
      $numberPage = $this->request->getQuery("page", "int");
    }

    $parameters = $this->persistent->parameters;
    if (!is_array($parameters)) {
      $parameters = [];
    }
    $parameters["order"] = "idDetalle";

    $detalleingreso = Detalleingreso::find($parameters);
    if (count($detalleingreso) == 0) {
      $this->flash->notice("The search did not find any detalleingreso");

      $this->dispatcher->forward([
        "controller" => "detalleingreso",
        "action" => "index"
      ]);

      return;
    }

    $paginator = new Paginator([
      'data' => $detalleingreso,
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

  }

  /**
  * Edits a detalleingreso
  *
  * @param string $idDetalle
  */
  public function editAction($idIngreso)
  {
    if (!$this->request->isPost()) {

      $parameters = array(
        "idIngreso" => $idIngreso,
      );

      $detalleingreso = Detalleingreso::find(array(
        "idIngreso = :idIngreso:",
        "bind" => $parameters
      ));

      $queryarchivos = Cargaingreso::find(array(
        "idIngreso = :idIngreso:",
        "bind" => $parameters
      ));

      $ingresomateria = Ingresomateria::findFirstByidIngreso($idIngreso);

      //Estados calidad
      $estadosCalidad = array(
        '1' => 'Aprobado',
        '2' => 'Rechazado',
        '3' => 'En cuarentena',
        '4' => 'Devolución',
        '5' => 'Retenido'
      );

      $this->view->estadosCalidad = $estadosCalidad;
      $this->view->detalleingreso = $detalleingreso;
      $this->view->idIngreso = $idIngreso;
      $this->view->idOrden = $ingresomateria->idOrden;
      $this->tag->setDefault("codigo", $ingresomateria->codigo);
      $this->tag->setDefault("version", $ingresomateria->version);
      $this->tag->setDefault("fecha", $ingresomateria->fecha);
      $this->tag->setDefault("idIngreso", $idIngreso);
      $this->view->archivos = $queryarchivos;
      // $this->tag->setDefault("idDetalle", $detalleingreso->idDetalle);
      // $this->tag->setDefault("nombreMaterial", $detalleingreso->nombreMaterial);
      // $this->tag->setDefault("fechaIngreso", $detalleingreso->fechaIngreso);
      // $this->tag->setDefault("lote", $detalleingreso->lote);
      // $this->tag->setDefault("estadoCalidad", $detalleingreso->estadoCalidad);
      // $this->tag->setDefault("fechaCaducidad", $detalleingreso->fechaCaducidad);
      // $this->tag->setDefault("na", $detalleingreso->na);
      // $this->tag->setDefault("cantidadMateriales", $detalleingreso->cantidadMateriales);
      // $this->tag->setDefault("certificado", $detalleingreso->certificado);
      // $this->tag->setDefault("informacionProveedor", $detalleingreso->informacionProveedor);
      // $this->tag->setDefault("referencia", $detalleingreso->referencia);
      // $this->tag->setDefault("recibe", $detalleingreso->recibe);
      // $this->tag->setDefault("observaciones", $detalleingreso->observaciones);
      // $this->tag->setDefault("idIngreso", $detalleingreso->idIngreso);
      $this->assets->addJs("js/detalleingreso.js");
    }
  }

  /**
  * Creates a new detalleingreso
  */
  public function createAction()
  {
    if (!$this->request->isPost()) {
      $this->dispatcher->forward([
        'controller' => "detalleingreso",
        'action' => 'index'
      ]);

      return;
    }

    $detalleingreso = new Detalleingreso();
    $detalleingreso->nombreMaterial = $this->request->getPost("nombreMaterial");
    $detalleingreso->fechaIngreso = $this->request->getPost("fechaIngreso");
    $detalleingreso->lote = $this->request->getPost("lote");
    $detalleingreso->estadoCalidad = $this->request->getPost("estadoCalidad");
    $detalleingreso->fechaCaducidad = $this->request->getPost("fechaCaducidad");
    $detalleingreso->na = $this->request->getPost("na");
    $detalleingreso->cantidadMateriales = $this->request->getPost("cantidadMateriales");
    $detalleingreso->certificado = $this->request->getPost("certificado");
    $detalleingreso->informacionProveedor = $this->request->getPost("informacionProveedor");
    $detalleingreso->referencia = $this->request->getPost("referencia");
    $detalleingreso->recibe = $this->request->getPost("recibe");
    $detalleingreso->observaciones = $this->request->getPost("observaciones");
    $detalleingreso->idIngreso = $this->request->getPost("idIngreso");


    if (!$detalleingreso->save()) {
      foreach ($detalleingreso->getMessages() as $message) {
        $this->flash->error($message);
      }

      $this->dispatcher->forward([
        'controller' => "detalleingreso",
        'action' => 'new'
      ]);

      return;
    }

    $this->flash->success("detalleingreso was created successfully");

    $this->dispatcher->forward([
      'controller' => "detalleingreso",
      'action' => 'index'
    ]);
  }

  /**
  * Saves a detalleingreso edited
  *
  */
  public function saveAction()
  {

    if (!$this->request->isPost()) {
      $this->dispatcher->forward([
        'controller' => "detalleingreso",
        'action' => 'index'
      ]);

      return;
    }

    // $idDetalle = $this->request->getPost("idDetalle");
    // $detalleingreso = Detalleingreso::findFirstByidDetalle($idDetalle);
    //
    // if (!$detalleingreso) {
    //   $this->flash->error("detalleingreso does not exist " . $idDetalle);
    //
    //   $this->dispatcher->forward([
    //     'controller' => "detalleingreso",
    //     'action' => 'index'
    //   ]);
    //
    //   return;
    // }


    $nombreMaterial = $this->request->getPost("nombreMaterial");
    $fechaIngreso = $this->request->getPost("fechaIngreso");
    $lote = $this->request->getPost("lote");
    $estadoCalidad = $this->request->getPost("estadoCalidad");
    $fechaCaducidad = $this->request->getPost("fechaCaducidad");
    $na = $this->request->getPost("na");
    $cantidadMateriales = $this->request->getPost("cantidadMateriales");
    $certificado = $this->request->getPost("certificado");
    $informacionProveedor = $this->request->getPost("informacionProveedor");
    $referencia = $this->request->getPost("referencia");
    $recibe = $this->request->getPost("recibe");
    $observaciones = $this->request->getPost("observaciones");
    $idDetalle = $this->request->getPost("idDetalle");
    $idIngreso = $this->request->getPost("idIngreso");
    $codigo = $this->request->getPost("codigo");
    $version = $this->request->getPost("version");
    $fecha = $this->request->getPost("fecha");

    if ($fecha == "" || $fecha == "0000-00-00") {
      $fecha = null;
    }

    $sqlingreso =  $this->db->query("UPDATE ingresomateria
      SET
      codigo='$codigo',
      version='$version',
      fecha='$fecha'
      WHERE idIngreso='$idIngreso'");

      for ($i=0; $i < count($nombreMaterial);$i++) {
        if (array_key_exists($i, $idDetalle)) {
          if ($fechaIngreso[$i] == "" || $fechaIngreso[$i] == "0000-00-00") {
            $fechaIngreso[$i] == null;
          }
          if ($fechaCaducidad[$i] == "" || $fechaCaducidad[$i] == "0000-00-00") {
            $fechaCaducidad[$i] == null;
          }
          $sql = $this->db->query("UPDATE  detalleingreso
            SET
            nombreMaterial='$nombreMaterial[$i]',
            fechaIngreso='$fechaIngreso[$i]',
            lote='$lote[$i]',
            estadoCalidad='$estadoCalidad[$i]',
            fechaCaducidad='$fechaCaducidad[$i]',
            na='$na[$i]',
            cantidadMateriales='$cantidadMateriales[$i]',
            certificado='$certificado[$i]',
            informacionProveedor='$informacionProveedor[$i]',
            referencia='$referencia[$i]',
            recibe='$recibe[$i]',
            observaciones='$observaciones[$i]'
            WHERE idDetalle='$idDetalle[$i]'");
          }else {
            $sql = $this->db->query("INSERT INTO detalleingreso
              (
                nombreMaterial,
                fechaIngreso,
                lote,
                estadoCalidad,
                fechaCaducidad,
                na,
                cantidadMateriales,
                certificado,
                informacionProveedor,
                referencia,
                recibe,
                observaciones,
                idIngreso
              )
              VALUES
              ('".$nombreMaterial[$i]."',
                '".$fechaIngreso[$i]."',
                '".$lote[$i]."',
                '".$estadoCalidad[$i]."',
                '".$fechaCaducidad[$i]."',
                '".$na[$i]."',
                '".$cantidadMateriales[$i]."',
                '".$certificado[$i]."',
                '".$informacionProveedor[$i]."',
                '".$referencia[$i]."',
                '".$recibe[$i]."',
                '".$observaciones[$i]."',
                '".$idIngreso."')");
              }
            }

            $this->flash->success("detalleingreso was updated successfully");

            return $this->response->redirect("detalleingreso/edit/".$idIngreso);
          }

          /**
          * Deletes a detalleingreso
          *
          * @param string $idDetalle
          */
          public function deleteAction($idDetalle)
          {
            $detalleingreso = Detalleingreso::findFirstByidDetalle($idDetalle);
            if (!$detalleingreso) {
              $this->flash->error("detalleingreso was not found");

              $this->dispatcher->forward([
                'controller' => "detalleingreso",
                'action' => 'index'
              ]);

              return;
            }

            if (!$detalleingreso->delete()) {

              foreach ($detalleingreso->getMessages() as $message) {
                $this->flash->error($message);
              }

              $this->dispatcher->forward([
                'controller' => "detalleingreso",
                'action' => 'search'
              ]);

              return;
            }

            $this->flash->success("detalleingreso was deleted successfully");

            $this->dispatcher->forward([
              'controller' => "detalleingreso",
              'action' => "index"
            ]);
          }

          public function EliminarIngresoAction()
          {
            $this->view->disable();
            if ($this->request->isGet() == true && $this->request->isAjax() == true) {
              $idDetalle =  $this->request->get("idIngreso");
              $detalle = Detalleingreso::findFirstByidDetalle($idDetalle);
              if (!$detalle->delete()) {

              }
              $this->response->setJsonContent("OK");
              $this->response->setStatusCode(200, "OK");
              $this->response->send();
            }
          }

          public function EliminarCargaAction()
          {
            $this->view->disable();
            if ($this->request->isGet() == true && $this->request->isAjax() == true) {
              $idCarga =  $this->request->get("idCarga");
              $carga = Cargaingreso::findFirstByidCarga($idCarga);

              if (!$carga->delete()) {

              }
              $this->response->setJsonContent("OK");
              $this->response->setStatusCode(200, "OK");
              $this->response->send();
            }
          }

          public function SubirArchivoAction()
          {
            $carga = new Cargaingreso();
            $carga->fechaCarga = date('Y-m-d');
            $carga->idIngreso = $this->request->getPost("idIngreso");

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

                  return $this->response->redirect("detalleingreso/edit/".$carga->idIngreso);
                }

                $this->flash->success("La carga fue realizada exitosamente.");

                return $this->response->redirect("detalleingreso/edit/".$carga->idIngreso);
              } else {
                $this->flash->error("Ocurrió un error al cargar los archivos");
                return $this->response->redirect("detalleingreso/edit/".$carga->idIngreso);
              }
            }else {
              $this->flash->error("Debes de seleccionar los archivos");
              return $this->response->redirect("detalleingreso/edit/".$carga->idIngreso);
            }
          }

        }
