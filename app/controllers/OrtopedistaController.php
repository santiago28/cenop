<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class OrtopedistaController extends ControllerBase
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
    $ortopedistas = Ortopedista::find();
    if (count($ortopedistas) == 0) {
      $this->flash->notice("No se ha agregado ningún ortopedista hasta el momento");
      $ortopedistas = null;
    }
    $this->view->ortopedistas = $ortopedistas;
  }

  /**
  * Searches for ortopedista
  */
  public function searchAction()
  {
    $numberPage = 1;
    if ($this->request->isPost()) {
      $query = Criteria::fromInput($this->di, 'Ortopedista', $_POST);
      $this->persistent->parameters = $query->getParams();
    } else {
      $numberPage = $this->request->getQuery("page", "int");
    }

    $parameters = $this->persistent->parameters;
    if (!is_array($parameters)) {
      $parameters = [];
    }
    $parameters["order"] = "idOrtopedista";

    $ortopedista = Ortopedista::find($parameters);
    if (count($ortopedista) == 0) {
      $this->flash->notice("The search did not find any ortopedista");

      $this->dispatcher->forward([
        "controller" => "ortopedista",
        "action" => "index"
      ]);

      return;
    }

    $paginator = new Paginator([
      'data' => $ortopedista,
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
    $tipotecnico = array(
      '1' => 'Técnico - Ortopedista',
      '2' => 'Fisioterapeuta - Terapeuta ocupacional'
    );
    $departamentos = Departamento::find();
    $this->view->departamentos = $departamentos;
    $this->view->tipotecnico = $tipotecnico;
  }

  /**
  * Edits a ortopedista
  *
  * @param string $idOrtopedista
  */
  public function editAction($idOrtopedista)
  {
    if (!$this->request->isPost()) {

      $ortopedista = Ortopedista::findFirstByidOrtopedista($idOrtopedista);
      $usuario = Usuario::findFirstByidUsuario($ortopedista->idUsuario);
      if (!$ortopedista) {
        $this->flash->error("Ortopedista no encontrado");

        $this->dispatcher->forward([
          'controller' => "ortopedista",
          'action' => 'index'
        ]);

        return;
      }

      $this->view->idOrtopedista = $ortopedista->idOrtopedista;

      $this->tag->setDefault("idOrtopedista", $ortopedista->idOrtopedista);
      $this->tag->setDefault("nombre", $ortopedista->nombre);
      $this->tag->setDefault("apellido", $ortopedista->apellido);
      $this->tag->setDefault("tipoDocumento", $ortopedista->tipoDocumento);
      $this->tag->setDefault("numeroDocumento", $ortopedista->numeroDocumento);
      $this->tag->setDefault("telefono", $ortopedista->telefono);
      $this->tag->setDefault("celular", $ortopedista->celular);
      $this->tag->setDefault("idMunicipio", $ortopedista->idMunicipio);
      //$this->tag->setDefault("idUsuario", $ortopedista->idUsuario);
      $this->tag->setDefault("tipoTecnico", $ortopedista->tipoTecnico);
      $this->tag->setDefault("estado", $usuario->estado);
      $departamentos = Departamento::find();
      $this->view->departamentos = $departamentos;
      $tipotecnico = array(
        '1' => 'Técnico - Ortopedista',
        '2' => 'Fisioterapeuta - Terapeuta ocupacional'
      );
      $this->view->tipotecnico = $tipotecnico;

      $listaestado = array(
        '1' => 'Activo',
        '0' => 'Inactivo'
      );
      $this->view->listaestado = $listaestado;
      $this->view->estado = $usuario->estado;
    }
  }

  /**
  * Creates a new ortopedista
  */
  public function createAction()
  {
    if (!$this->request->isPost()) {
      $this->dispatcher->forward([
        'controller' => "ortopedista",
        'action' => 'index'
      ]);

      return;
    }

    $ortopedista = new Ortopedista();
    $ortopedista->nombre = $this->request->getPost("nombre");
    $ortopedista->apellido = $this->request->getPost("apellido");
    $ortopedista->tipoDocumento = $this->request->getPost("tipoDocumento");
    $ortopedista->numeroDocumento = $this->request->getPost("numeroDocumento");
    $ortopedista->telefono = $this->request->getPost("telefono");
    $ortopedista->celular = $this->request->getPost("celular");
    $ortopedista->idMunicipio = $this->request->getPost("idMunicipio");
    $ortopedista->tipoTecnico = $this->request->getPost("tipoTecnico");
    $ortopedista->idEmpresa = 1;
    $password = $this->security->hash($this->request->getPost("numeroDocumento"));
    $sql = $this->db->query("INSERT INTO usuario (nombreUsuario, contrasena, correo, tipoUsuario, estado) VALUES ('".$ortopedista->numeroDocumento."','".$password."', 's@s.com', 1, 1)");
    $lastId = $this->db->lastInsertId();
    $ortopedista->idUsuario = $lastId;

    if (!$ortopedista->save()) {
      foreach ($ortopedista->getMessages() as $message) {
        $this->flash->error($message);
      }

      $this->dispatcher->forward([
        'controller' => "ortopedista",
        'action' => 'new'
      ]);

      return;
    }

    $this->flash->success("Ortopedista registrado/a exitosamente");

    $this->dispatcher->forward([
      'controller' => "ortopedista",
      'action' => 'index'
    ]);

    return $this->response->redirect("ortopedista/index");
  }

  /**
  * Saves a ortopedista edited
  *
  */
  public function saveAction()
  {

    if (!$this->request->isPost()) {
      $this->dispatcher->forward([
        'controller' => "ortopedista",
        'action' => 'index'
      ]);

      return;
    }

    $idOrtopedista = $this->request->getPost("idOrtopedista");
    $ortopedista = Ortopedista::findFirstByidOrtopedista($idOrtopedista);
    $usuario = Usuario::findFirstByidUsuario($ortopedista->idUsuario);

    if (!$ortopedista) {
      $this->flash->error("ortopedista does not exist " . $idOrtopedista);

      $this->dispatcher->forward([
        'controller' => "ortopedista",
        'action' => 'index'
      ]);

      return;
    }

    $ortopedista->nombre = $this->request->getPost("nombre");
    $ortopedista->apellido = $this->request->getPost("apellido");
    $ortopedista->tipoDocumento = $this->request->getPost("tipoDocumento");
    $ortopedista->numeroDocumento = $this->request->getPost("numeroDocumento");
    $ortopedista->telefono = $this->request->getPost("telefono");
    $ortopedista->celular = $this->request->getPost("celular");
    $ortopedista->idMunicipio = $this->request->getPost("idMunicipio");
    //$ortopedista->idUsuario = $this->request->getPost("idUsuario");
    $ortopedista->tipoTecnico = $this->request->getPost("tipoTecnico");
    $usuario->estado = $this->request->getPost("estado");
    if($this->request->getPost("contrasena")){
      $usuario->contrasena = $this->security->hash($this->request->getPost("contrasena"));
      if (!$usuario->save()) {
        foreach ($usuario->getMessages() as $message) {
          $this->flash->error($message);
        }
      }
    }

    if (!$ortopedista->save()) {

      foreach ($ortopedista->getMessages() as $message) {
        $this->flash->error($message);
      }

      $this->dispatcher->forward([
        'controller' => "ortopedista",
        'action' => 'edit',
        'params' => [$ortopedista->idOrtopedista]
      ]);

      return;
    }

    $sql = $this->db->query("UPDATE usuario set estado = '$usuario->estado' WHERE idUsuario = '$usuario->idUsuario'");



    $this->dispatcher->forward([
      'controller' => "ortopedista",
      'action' => 'index'
    ]);

    $this->flash->success("Ortopedista editado exitosamente");

    return $this->response->redirect("ortopedista/index");
  }

  /**
  * Deletes a ortopedista
  *
  * @param string $idOrtopedista
  */
  public function deleteAction($idOrtopedista)
  {
    $ortopedista = Ortopedista::findFirstByidOrtopedista($idOrtopedista);
    if (!$ortopedista) {
      $this->flash->error("ortopedista was not found");

      $this->dispatcher->forward([
        'controller' => "ortopedista",
        'action' => 'index'
      ]);

      return;
    }

    if (!$ortopedista->delete()) {

      foreach ($ortopedista->getMessages() as $message) {
        $this->flash->error($message);
      }

      $this->dispatcher->forward([
        'controller' => "ortopedista",
        'action' => 'search'
      ]);

      return;
    }

    $this->dispatcher->forward([
      'controller' => "ortopedista",
      'action' => "index"
    ]);

    $this->flash->success("Ortopedista eliminado exitosamente");

    return $this->response->redirect("ortopedista/index");
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
