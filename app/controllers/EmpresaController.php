<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class EmpresaController extends ControllerBase
{
  public function initialize()
  {
    //$this->tag->setTitle("Permisos");
    //$this->id_usuario = $this->user['id_usuario'];
    $this->user = $this->session->get('auth');

    parent::initialize();
  }
  /**
  * Index for Empresa
  */
  public function indexAction()
  {
    $empresas = Empresa::find();
    if (count($empresas) == 0) {
      $this->flash->notice("No se ha agregado ninguna empresa hasta el momento");
      $empresas = null;
    }
    $this->view->empresas = $empresas;
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
  * Edits a Empresa
  *
  * @param string $idEmpresa
  */
  public function editAction($idEmpresa)
  {
    if (!$this->request->isPost()) {

      $empresa = Empresa::findFirstByidEmpresa($idEmpresa);
      if (!$empresa) {
        $this->flash->error("Empresa was not found");

        $this->dispatcher->forward([
          'controller' => "Empresa",
          'action' => 'index'
        ]);

        return;
      }

      $this->view->idEmpresa = $empresa->idEmpresa;

      $this->tag->setDefault("idEmpresa", $empresa->idEmpresa);
      $this->tag->setDefault("nombre", $empresa->nombre);
      $this->tag->setDefault("nombreInterno", $empresa->nombreInterno);
      $this->tag->setDefault("nit", $empresa->nit);
      $this->tag->setDefault("idMunicipio", $empresa->idMunicipio);
      $this->tag->setDefault("telefono", $empresa->telefono);
      $this->tag->setDefault("cedulaRepresentante", $empresa->cedulaRepresentante);
      $this->tag->setDefault("representanteLegal", $empresa->representanteLegal);

      $departamentos = Departamento::find();
      $municipio = Municipio::findFirstByidMunicipio($empresa->idMunicipio);
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
    }
  }

  /**
  * Creates a new Empresa
  */
  public function createAction()
  {
    if (!$this->request->isPost()) {
      $this->dispatcher->forward([
        'controller' => "Empresa",
        'action' => 'index'
      ]);

      return;
    }

    $empresa = new Empresa();
    $empresa->nombre = $this->request->getPost("nombre");
    $empresa->nit = $this->request->getPost("nit");
    $empresa->idMunicipio = $this->request->getPost("idMunicipio");
    $empresa->telefono = $this->request->getPost("telefono");
    $empresa->cedulaRepresentante = $this->request->getPost("cedulaRepresentante");
    $empresa->representanteLegal = $this->request->getPost("representanteLegal");
    $empresa->nombreInterno = $this->request->getPost("nombreInterno");
    $password = $this->security->hash($this->request->getPost("cedulaRepresentante"));
    $sql = $this->db->query("INSERT INTO usuario (nombreUsuario, contrasena, correo, tipoUsuario, estado) VALUES ('".$empresa->cedulaRepresentante."','".$password."', 's@s.com', 2, 1)");
    $lastId = $this->db->lastInsertId();
    $empresa->idUsuario = $lastId;


    if (!$empresa->save()) {
      foreach ($empresa->getMessages() as $message) {
        $this->flash->error($message);
      }

      $this->dispatcher->forward([
        'controller' => "Empresa",
        'action' => 'new'
      ]);

      return;
    }

    $this->flash->success("Empresa registrada exitosamente");

    return $this->response->redirect("empresa/index");
  }

  /**
  * Saves a Empresa edited
  *
  */
  public function saveAction()
  {

    if (!$this->request->isPost()) {
      $this->dispatcher->forward([
        'controller' => "Empresa",
        'action' => 'index'
      ]);

      return;
    }

    $idEmpresa = $this->request->getPost("idEmpresa");
    $empresa = Empresa::findFirstByidEmpresa($idEmpresa);

    if (!$empresa) {
      $this->flash->error("Empresa does not exist " . $idEmpresa);

      $this->dispatcher->forward([
        'controller' => "Empresa",
        'action' => 'index'
      ]);

      return;
    }

    $empresa->nombre = $this->request->getPost("nombre");
    $empresa->nombreInterno = $this->request->getPost("nombreInterno");
    $empresa->nit = $this->request->getPost("nit");
    $empresa->idMunicipio = $this->request->getPost("idMunicipio");
    $empresa->telefono = $this->request->getPost("telefono");
    $empresa->cedulaRepresentante = $this->request->getPost("cedulaRepresentante");
    $empresa->representanteLegal = $this->request->getPost("representanteLegal");


    if (!$empresa->save()) {

      foreach ($empresa->getMessages() as $message) {
        $this->flash->error($message);
      }

      $this->dispatcher->forward([
        'controller' => "Empresa",
        'action' => 'edit',
        'params' => [$empresa->idEmpresa]
      ]);

      return;
    }

    $this->flash->success("Empresa editada exitosamente");

    return $this->response->redirect("empresa/index");
  }

  /**
  * Deletes a Empresa
  *
  * @param string $idEmpresa
  */
  public function deleteAction($idEmpresa)
  {
    $empresa = Empresa::findFirstByidEmpresa($idEmpresa);
    if (!$empresa) {
      $this->flash->error("Empresa was not found");

      $this->dispatcher->forward([
        'controller' => "Empresa",
        'action' => 'index'
      ]);

      return;
    }

    if (!$empresa->delete()) {

      foreach ($empresa->getMessages() as $message) {
        $this->flash->error($message);
      }

      $this->dispatcher->forward([
        'controller' => "Empresa",
        'action' => 'search'
      ]);

      return;
    }

    $this->flash->success("Empresa eliminada exitosamente");

    return $this->response->redirect("empresa/index");
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
