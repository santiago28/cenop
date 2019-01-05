<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class SessionController extends ControllerBase
{

  public function initialize()
  {
    $this->tag->setTitle('Iniciar Sesión');
    parent::initialize();
  }

  public function indexAction()
  {
  }

  private function _registerSession($user)
  {
    if ($user->tipoUsuario == 1  || $user->tipoUsuario == 0) {
      $persona = Ortopedista::findFirstByidUsuario($user->idUsuario);
    }elseif ($user->tipoUsuario == 3) {
      $persona = Paciente::findFirstByidUsuario($user->idUsuario);
    }elseif ($user->tipoUsuario == 2) {
      $persona = Empresa::findFirstByidUsuario($user->idUsuario);
    }elseif ($user->tipoUsuario == 0) {

    }

    $nombre = "";
    if ($user->tipoUsuario == 2) {
      $nombre = $persona->nombre;
    }else {
      $nombre = $persona->nombre. ' ' .$persona->apellido;
    }



    $this->session->set('auth',array(
      'idUsuario' => $user->idUsuario,
      'nombreUsuario' => $user->nombreUsuario,
      'nombre' => $nombre,
      'tipoUsuario' => $user->tipoUsuario
    ));
  }

  public function startAction()
  {
    if ($this->request->isPost()) {
      $nombreUsuario = $this->request->getPost('nombreUsuario');
      $contrasena = $this->request->getPost('contrasena');
      $user = Usuario::findFirst(array("nombreUsuario='$nombreUsuario' and estado = '1'"));
      if ($user) {
        if ($this->security->checkHash($contrasena, $user->contrasena)) {
          $this->_registerSession($user);
          $this->flash->success('Bienvenido(a) ' . $user->nombre);
          if ($this->session->has("last_url")) {
            return $this->response->redirect($this->session->get("last_url"));
          }
          if ($user->tipoUsuario == 2) {
            return $this->response->redirect('ordenproduccion/index');
          }else {
            return $this->response->redirect('agenda/new');
          }
        }
      }
      $this->flash->error('Contraseña o usuario inválido');
    }
    // return $this->response->redirect('session/index');
  }

  /**
  * Finalización de la sesión redireccionando al inicio
  *
  * @return unknown
  */
  public function endAction()
  {
    $this->session->remove('auth');
    $this->flash->success('¡Hasta pronto!');
    return $this->response->redirect('session/index');
  }

}
?>
