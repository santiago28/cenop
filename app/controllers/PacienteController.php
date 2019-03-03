<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class PacienteController extends ControllerBase
{
  public $user;

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
    $pacientes = Paciente::find();
    if (count($pacientes) == 0) {
      $this->flash->notice("No se ha agregado ningún paciente hasta el momento");
      $pacientes = null;
    }
    $this->view->pacientes = $pacientes;
  }

  /**
  * Searches for paciente
  */
  public function searchAction()
  {
    $numberPage = 1;
    if ($this->request->isPost()) {
      $query = Criteria::fromInput($this->di, 'Paciente', $_POST);
      $this->persistent->parameters = $query->getParams();
    } else {
      $numberPage = $this->request->getQuery("page", "int");
    }

    $parameters = $this->persistent->parameters;
    if (!is_array($parameters)) {
      $parameters = [];
    }
    $parameters["order"] = "idPaciente";

    $paciente = Paciente::find($parameters);
    if (count($paciente) == 0) {
      $this->flash->notice("The search did not find any paciente");

      $this->dispatcher->forward([
        "controller" => "paciente",
        "action" => "index"
      ]);

      return;
    }

    $paginator = new Paginator([
      'data' => $paciente,
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
    $departamentos = Departamento::find();
    $this->view->departamentos = $departamentos;
  }

  /**
  * Edits a paciente
  *
  * @param string $idPaciente
  */
  public function editAction($idPaciente)
  {
    if (!$this->request->isPost()) {

      $paciente = Paciente::findFirstByidPaciente($idPaciente);
      if (!$paciente) {
        $this->flash->error("Paciente no encontrado");

        $this->dispatcher->forward([
          'controller' => "paciente",
          'action' => 'index'
        ]);

        return;
      }

      $this->view->idPaciente = $paciente->idPaciente;

      $this->tag->setDefault("idPaciente", $paciente->idPaciente);
      $this->tag->setDefault("nombre", $paciente->nombre);
      $this->tag->setDefault("apellido", $paciente->apellido);
      $this->tag->setDefault("tipoDocumento", $paciente->tipoDocumento);
      $this->tag->setDefault("numeroDocumento", $paciente->numeroDocumento);
      $this->tag->setDefault("telefono", $paciente->telefono);
      $this->tag->setDefault("celular", $paciente->celular);
      $this->tag->setDefault("idMunicipio", $paciente->idMunicipio);
      $this->tag->setDefault("direccion", $paciente->direccion);
      $this->tag->setDefault("edad", $paciente->edad);
      $this->tag->setDefault("estatura", $paciente->estatura);
      $this->tag->setDefault("peso", $paciente->peso);
      $this->tag->setDefault("idUsuario", $paciente->idUsuario);
      $departamentos = Departamento::find();
      $municipio = Municipio::findFirstByidMunicipio($paciente->idMunicipio);
      $departamentos2 = array();
      foreach ($departamentos as $key => $value) {
        $departamentos2[$value->idDepartamento] = $value->nombre;
      }
      $parameters = array(
        "idDepartamento" => $municipio->idDepartamento,
      );

      $municipios = Municipio::find(array(
        "colums" => "idMunicipio, nombre",
        "idDepartamento = :idDepartamento:",
        "bind" => $parameters
      ));
      $municipios2 = array();
      foreach ($municipios as $key => $value) {
        $municipios2[$value->idMunicipio] = $value->nombre;
      }
      $this->tag->setDefault("idDepartamento", $municipio->idDepartamento);
      $this->view->departamentos = $departamentos2;
      $this->view->municipios = $municipios2;
      // $this->assets->addJs("js/Module.js");
      // $this->assets->addJs("jsWacomInkEngine.js.mem");
      // $this->assets->addJs("js/WacomInkEngine.js");

      $this->assets->addJs("js/js.ext.js");
      $this->assets->addJs("js/wacomfirma.js");
    }
  }

  /**
  * Creates a new paciente
  */
  public function createAction()
  {
    if (!$this->request->isPost()) {
      $this->dispatcher->forward([
        'controller' => "paciente",
        'action' => 'index'
      ]);

      return;
    }

    $paciente = new Paciente();
    $paciente->nombre = $this->request->getPost("nombre");
    $paciente->apellido = $this->request->getPost("apellido");
    $paciente->tipoDocumento = $this->request->getPost("tipoDocumento");
    $paciente->numeroDocumento = $this->request->getPost("numeroDocumento");
    $paciente->telefono = $this->request->getPost("telefono");
    $paciente->celular = $this->request->getPost("celular");
    $paciente->idMunicipio = $this->request->getPost("idMunicipio");
    $paciente->direccion = $this->request->getPost("direccion");
    $paciente->edad = $this->request->getPost("edad");
    $paciente->estatura = $this->request->getPost("estatura");
    $paciente->peso = $this->request->getPost("peso");
    $password = $this->security->hash($this->request->getPost("numeroDocumento"));
    $sql = $this->db->query("INSERT INTO usuario (nombreUsuario, contrasena, correo, tipoUsuario, estado) VALUES ('".$paciente->numeroDocumento."','".$password."', 's@s.com', 3, 1)");
    $lastId = $this->db->lastInsertId();
    $paciente->idUsuario = $lastId;

    if (!$paciente->save()) {
      foreach ($paciente->getMessages() as $message) {
        $this->flash->error($message);
      }

      $this->dispatcher->forward([
        'controller' => "paciente",
        'action' => 'new'
      ]);

      return;
    }

    $this->flash->success("Paciente registrado/a exitosamente");

    return $this->response->redirect("paciente/index");


  }

  /**
  * Saves a paciente edited
  *
  */
  public function saveAction()
  {

    if (!$this->request->isPost()) {
      $this->dispatcher->forward([
        'controller' => "paciente",
        'action' => 'index'
      ]);

      return;
    }

    $idPaciente = $this->request->getPost("idPaciente");
    $paciente = Paciente::findFirstByidPaciente($idPaciente);

    if (!$paciente) {
      $this->flash->error("paciente does not exist " . $idPaciente);

      $this->dispatcher->forward([
        'controller' => "paciente",
        'action' => 'index'
      ]);

      return;
    }

    $paciente->nombre = $this->request->getPost("nombre");
    $paciente->apellido = $this->request->getPost("apellido");
    $paciente->tipoDocumento = $this->request->getPost("tipoDocumento");
    $paciente->numeroDocumento = $this->request->getPost("numeroDocumento");
    $paciente->telefono = $this->request->getPost("telefono");
    $paciente->celular = $this->request->getPost("celular");
    $paciente->idMunicipio = $this->request->getPost("idMunicipio");
    $paciente->direccion = $this->request->getPost("direccion");
    $paciente->edad = $this->request->getPost("edad");
    $paciente->estatura = $this->request->getPost("estatura");
    $paciente->peso = $this->request->getPost("peso");
    //$paciente->idUsuario = $this->request->getPost("idUsuario");


    if (!$paciente->save()) {

      foreach ($paciente->getMessages() as $message) {
        $this->flash->error($message);
      }

      $this->dispatcher->forward([
        'controller' => "paciente",
        'action' => 'edit',
        'params' => [$paciente->idPaciente]
      ]);

      return;
    }

    $this->flash->success("Paciente editado exitosamente");

    return $this->response->redirect("paciente/index");
  }

  /**
  * Deletes a paciente
  *
  * @param string $idPaciente
  */
  public function deleteAction($idPaciente)
  {
    $paciente = Paciente::findFirstByidPaciente($idPaciente);
    if (!$paciente) {
      $this->flash->error("paciente was not found");

      $this->dispatcher->forward([
        'controller' => "paciente",
        'action' => 'index'
      ]);

      return;
    }

    if (!$paciente->delete()) {

      foreach ($paciente->getMessages() as $message) {
        $this->flash->error($message);
      }

      $this->dispatcher->forward([
        'controller' => "paciente",
        'action' => 'search'
      ]);

      return;
    }

    $this->flash->success("Paciente eliminado exitosamente");

    return $this->response->redirect("paciente/index");
  }

  public function consultarMunicipiosAction()
  {
    $this->view->disable();

    if ($this->request->isGet() == true && $this->request->isAjax() == true) {
      $idDepartamento =  $this->request->get("departamento");

      $parameters = array(
        "idDepartamento" => $idDepartamento,
      );

      $municipios = Municipio::find(array(
        "colums" => "idMunicipio, nombre, idDepartamento",
        "idDepartamento = :idDepartamento:",
        "bind" => $parameters
      ));

      $rows = array();
      foreach ($municipios as $municipio) {
        array_push($rows,$municipio);
      }

      $this->response->setJsonContent($rows);
      $this->response->setStatusCode(200, "OK");
      $this->response->send();
    }
  }

}
