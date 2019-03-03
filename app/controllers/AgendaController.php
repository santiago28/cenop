<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class AgendaController extends ControllerBase
{
  public $user;

  public function initialize()
  {
    //$this->tag->setTitle("Permisos");
    $this->user = $this->session->get('auth');
    //$this->id_usuario = $this->user['id_usuario'];
    parent::initialize();
  }

  public function indexAction()
  {
    $this->persistent->parameters = null;
  }

  /**
  * Searches for agenda
  */
  public function searchAction()
  {
    $numberPage = 1;
    if ($this->request->isPost()) {
      $query = Criteria::fromInput($this->di, 'Agenda', $_POST);
      $this->persistent->parameters = $query->getParams();
    } else {
      $numberPage = $this->request->getQuery("page", "int");
    }

    $parameters = $this->persistent->parameters;
    if (!is_array($parameters)) {
      $parameters = [];
    }
    $parameters["order"] = "IdAgenda";

    $agenda = Agenda::find($parameters);
    if (count($agenda) == 0) {
      $this->flash->notice("The search did not find any agenda");

      $this->dispatcher->forward([
        "controller" => "agenda",
        "action" => "index"
      ]);

      return;
    }

    $paginator = new Paginator([
      'data' => $agenda,
      'limit'=> 10,
      'page' => $numberPage
    ]);

    $this->view->page = $paginator->getPaginate();
  }

  /**
  * Displays the creation form
  */


  public function ConsultarDisponibilidadTecnicoAction()
  {
    $this->view->disable();
    if ($this->request->isGet() == true && $this->request->isAjax() == true) {
      $fechaCita = $this->request->get("fechaCita");
      $horaInicio = $this->request->get("horaInicio");
      $horaFin = $this->request->get("horaFin");



      $query = $this->db->query("
      select o.*
      from ortopedista o
      where not exists

      (select a.idOrtopedista

      from agenda a

      where a.fechaCita = '$fechaCita' and a.idOrtopedista = o.idOrtopedista
      and ((a.horaInicio >= ADDTIME(convert('$horaInicio', time), '00:01') and a.horaInicio <= ADDTIME(convert('$horaFin', time), '-00:01'))

      or (a.horaFin >= ADDTIME(convert('$horaInicio', time), '00:01') and a.horaFin <= ADDTIME(convert('$horaFin', time), '-00:01'))

      or (a.horaInicio <= ADDTIME(convert('$horaInicio', time), '00:01') and a.horaFin >= ADDTIME(convert('$horaFin', time), '-00:01'))));
      ");

      $query->setFetchMode(Phalcon\Db::FETCH_OBJ);
      $datos = array();
      $rows = $query->numRows();
      foreach ($query->fetchAll() as $key => $value) {
        $ortopedista = new Ortopedista;
        $ortopedista->idOrtopedista = $value->idOrtopedista;
        $ortopedista->nombre = $value->nombre;
        $ortopedista->apellido = $value->apellido;
        $datos[$key] = $ortopedista;
      }

      $this->response->setJsonContent($datos);
      $this->response->setStatusCode(200, "OK");
      $this->response->send();
    }
  }

  public function newAction()
  {
    // $this->assets->addCss("css/fullcalendar.css");
    // $this->assets->addCss("css/fullcalendar.print.css");
    // $this->assets->addJs("js/moment.js");
    // $this->assets->addJs("js/fullcalendar.js");
    $this->view->tipoUsuario = $this->user["tipoUsuario"];
    $this->assets->addJs("js/agenda.js");
    $empresa = Empresa::find();
    $this->view->empresas = $empresa;
    // $ortopedistas = Ortopedista::find();
    // $this->view->ortopedistas = $ortopedistas;
  }

  /**
  * Edits a agenda
  *
  * @param string $IdAgenda
  */
  public function editAction($IdAgenda)
  {
    if (!$this->request->isPost()) {

      $agenda = Agenda::findFirstByIdAgenda($IdAgenda);
      if (!$agenda) {
        $this->flash->error("agenda was not found");

        $this->dispatcher->forward([
          'controller' => "agenda",
          'action' => 'index'
        ]);

        return;
      }

      $this->view->IdAgenda = $agenda->IdAgenda;

      $this->tag->setDefault("IdAgenda", $agenda->IdAgenda);
      $this->tag->setDefault("IdPaciente", $agenda->IdPaciente);
      $this->tag->setDefault("IdOrtopedista", $agenda->IdOrtopedista);
      $this->tag->setDefault("FechaCita", $agenda->FechaCita);
      $this->tag->setDefault("HoraCita", $agenda->HoraCita);

    }
  }

  /**
  * Creates a new agenda
  */
  public function createAction()
  {
    if (!$this->request->isPost()) {
      $this->dispatcher->forward([
        'controller' => "agenda",
        'action' => 'new'
      ]);

      return;
    }

    $agenda = new Agenda();
    $agenda->idPaciente = $this->request->getPost("idPaciente");
    $agenda->idOrtopedista = $this->request->getPost("idOrtopedista");
    $agenda->fechaCita = $this->request->getPost("fechaCita");
    $agenda->horaInicio = $this->request->getPost("horaInicio");
    $agenda->horaFin = $this->request->getPost("horaFin");
    $agenda->motivo = $this->request->getPost("motivo");
    $agenda->tipo = 1;
    $agenda->idEmpresa = $this->request->getPost("idEmpresa");


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

    return $this->response->redirect("agenda/new");
  }

  /**
  * Saves a agenda edited
  *
  */
  public function saveAction()
  {

    if (!$this->request->isPost()) {
      $this->dispatcher->forward([
        'controller' => "agenda",
        'action' => 'index'
      ]);

      return;
    }

    $IdAgenda = $this->request->getPost("IdAgenda");
    $agenda = Agenda::findFirstByIdAgenda($IdAgenda);

    if (!$agenda) {
      $this->flash->error("agenda does not exist " . $IdAgenda);

      $this->dispatcher->forward([
        'controller' => "agenda",
        'action' => 'index'
      ]);

      return;
    }

    $agenda->idPaciente = $this->request->getPost("IdPaciente");
    $agenda->idOrtopedista = $this->request->getPost("IdOrtopedista");
    $agenda->fechaCita = $this->request->getPost("FechaCita");
    $agenda->horaCita = $this->request->getPost("HoraCita");


    if (!$agenda->save()) {

      foreach ($agenda->getMessages() as $message) {
        $this->flash->error($message);
      }

      $this->dispatcher->forward([
        'controller' => "agenda",
        'action' => 'edit',
        'params' => [$agenda->IdAgenda]
      ]);

      return;
    }

    $this->flash->success("agenda was updated successfully");

    $this->dispatcher->forward([
      'controller' => "agenda",
      'action' => 'index'
    ]);
  }

  /**
  * Deletes a agenda
  *
  * @param string $IdAgenda
  */
  public function deleteAction($IdAgenda)
  {
    $agenda = Agenda::findFirstByIdAgenda($IdAgenda);
    if (!$agenda) {
      $this->flash->error("agenda was not found");

      $this->dispatcher->forward([
        'controller' => "agenda",
        'action' => 'index'
      ]);

      return;
    }

    if (!$agenda->delete()) {

      foreach ($agenda->getMessages() as $message) {
        $this->flash->error($message);
      }

      $this->dispatcher->forward([
        'controller' => "agenda",
        'action' => 'search'
      ]);

      return;
    }

    $this->flash->success("agenda was deleted successfully");

    $this->dispatcher->forward([
      'controller' => "agenda",
      'action' => "index"
    ]);
  }

  public function EliminarCitaAction()
  {
    $this->view->disable();
    if ($this->request->isGet() == true && $this->request->isAjax() == true) {
      $idAgenda = $this->request->get("idAgenda");
      $agenda = Agenda::findFirstByidAgenda($idAgenda);
      if (!$agenda->delete()) {

      }
      $this->response->setJsonContent("OK");
      $this->response->setStatusCode(200, "OK");
      $this->response->send();
    }
  }

  public function ConsultarCitasEliminarAction()
  {
    $this->view->disable();
    if ($this->request->isGet() == true && $this->request->isAjax() == true) {
      $fechaActual = date("Y-m-d", (strtotime ("-7 Hours")));
      $query = $this->db->query("
      select p.nombre, p.apellido, a.fechaCita, a.horaInicio, a.horaFin, a.idAgenda
      from agenda a join paciente p on a.idPaciente = p.idPaciente
      WHERE a.fechaCita >= '$fechaActual'");

      $query->setFetchMode(Phalcon\Db::FETCH_OBJ);
      $datos = array();
      $rows = $query->numRows();
      foreach ($query->fetchAll() as $key => $value) {
        $agenda = new AgendaDTO;
        $agenda->idAgenda = $value->idAgenda;
        $agenda->nombrePaciente = $value->nombre." ".$value->apellido;
        $agenda->fechaCita = $value->fechaCita;
        $agenda->horaInicio = $value->horaInicio;
        $agenda->horaFin = $value->horaFin;
        $datos[$key] = $agenda;
      }

      $this->response->setJsonContent($datos);
      $this->response->setStatusCode(200, "OK");
      $this->response->send();
    }
  }

  public function ConsultarTodasCitasAction()
  {
    $this->view->disable();

    if ($this->request->isGet() == true && $this->request->isAjax() == true) {
      if ($this->user['tipoUsuario'] == "1") {
        $ortopedista = Ortopedista::findFirstByidUsuario($this->user['idUsuario']);

        $parameters = array(
          "idOrtopedista" => $ortopedista->idOrtopedista,
        );

        $citas = Agenda::find(array(
          "idOrtopedista = :idOrtopedista:",
          "bind" => $parameters
        ));
      }elseif ($this->user['tipoUsuario'] == "3") {
        $paciente = Paciente::findFirstByidUsuario($this->user['idUsuario']);
        $parameters = array(
          "idPaciente" => $paciente->idPaciente,
        );

        $citas = Agenda::find(array(
          "idPaciente = :idPaciente:",
          "bind" => $parameters
        ));

      }elseif ($this->user['tipoUsuario'] == "2") {
        $empresa = Empresa::findFirstByidUsuario($this->user['idUsuario']);
        $parameters = array(
          "idEmpresa" => $empresa->idEmpresa,
        );
        $citas = Agenda::find(array(
          "idEmpresa = :idEmpresa:",
          "bind" => $parameters
        ));
      }else {
        $citas = Agenda::find();
      }
      
      
      
      $rows = array();
      foreach ($citas as $cita) {
        $info = new AgendaDTO();
        $info->idPaciente = $cita->idPaciente;
        $info->idOrtopedista = $cita->idOrtopedista;
        $info->idAgenda = $cita->idAgenda;
        $info->fechaCita = $cita->fechaCita;
        $info->horaInicio = $cita->horaInicio;
        $info->horaFin = $cita->horaFin;
        $info->motivo = $cita->motivo;

        $ordenproduccion = Ordenproduccion::findFirstByidPaciente($cita->idPaciente);
        if ($ordenproduccion) {
          $info->op = $ordenproduccion->idOrden;
        }else {
          $info->op = "";
        }
        $paciente = Paciente::findFirstByidPaciente($cita->idPaciente);
        $info->nombrePaciente = $paciente->nombre . " " . $paciente->apellido;
        
        if ($cita->idEmpresa != 0) {
          $empresacita = Empresa::findFirstByidEmpresa($cita->idEmpresa);
          $info->nombreEmpresa = $empresacita->nombre;          
        }
        
        $ortopedista = Ortopedista::findFirstByidOrtopedista($cita->idOrtopedista);
        $info->nombreOrtopedista = $ortopedista->nombre . " " . $ortopedista->apellido;
        array_push($rows,$info);
      }

      $this->response->setJsonContent($rows);
      $this->response->setStatusCode(200, "OK");
      $this->response->send();
    }
  }

}
