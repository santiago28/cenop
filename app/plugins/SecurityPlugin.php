<?php

use Phalcon\Events\Event,
Phalcon\Mvc\Dispatcher,
Phalcon\Mvc\User\Plugin;

/**
* Security
*
* Gestiona los niveles de permisos de toda la aplicación
*/
class SecurityPlugin extends Plugin
{
  /* This action is executed before execute any action in the application
  *
  * @param Event $event
  * @param Dispatcher $dispatcher
  */

  private $_permiso = array(
    'paciente' => array(
      'index' => array(
        'nivelPermiso' => '0'
      ),
      'edit' => array(
        'nivelPermiso' => '0'
      ),
      'new' => array(
        'nivelPermiso' => '0'
      ),
      'create' => array(
        'nivelPermiso' => '0'
      ),
      'save' => array(
        'nivelPermiso' => '0'
      ),
      'delete' => array(
        'nivelPermiso' => '0'
      ),
      'consultarMunicipios' => array(
        'nivelPermiso' => '0'
      )
    ),
    'ortopedista' => array(
      'index' => array(
        'nivelPermiso' => '0'
      ),
      'edit' => array(
        'nivelPermiso' => '0'
      ),
      'new' => array(
        'nivelPermiso' => '0'
      ),
      'create' => array(
        'nivelPermiso' => '0'
      ),
      'save' => array(
        'nivelPermiso' => '0'
      ),
      'delete' => array(
        'nivelPermiso' => '0'
      ),
      'consultarMunicipios' => array(
        'nivelPermiso' => '0'
      )
    ),
    'empresa' => array(
      'index' => array(
        'nivelPermiso' => '0'
      ),
      'edit' => array(
        'nivelPermiso' => '0'
      ),
      'new' => array(
        'nivelPermiso' => '0'
      ),
      'create' => array(
        'nivelPermiso' => '0'
      ),
      'save' => array(
        'nivelPermiso' => '0'
      ),
      'delete' => array(
        'nivelPermiso' => '0'
      ),
      'consultarMunicipios' => array(
        'nivelPermiso' => '0'
      )
    ),
    'ordenproduccion' => array(
      'index' => array(
        'nivelPermiso' => '2'
      ),
      'edit' => array(
        'nivelPermiso' => '2'
      ),
      'new' => array(
        'nivelPermiso' => '0'
      ),
      'create' => array(
        'nivelPermiso' => '0'
      ),
      'save' => array(
        'nivelPermiso' => '1'
      ),
      'delete' => array(
        'nivelPermiso' => '0'
      ),
      'deletemateria' => array(
        'nivelPermiso' => '0'
      ),
      'createAgendaEntrenamiento' => array(
        'nivelPermiso' => '1'
      ),
      'BuscarPaciente' => array(
        'nivelPermiso' => '-2'
      ),
      'BuscarDatosOrden' => array(
        'nivelPermiso' => '-2'
      ),
      'ConsultarPacientes' => array(
        'nivelPermiso' => '1'
      ),
      'SubirArchivo' => array(
        'nivelPermiso' => '1'
      ),
      'SubirFirma' => array(
        'nivelPermiso' => '1'
      ),
      'ActualizarEstadoOrden' => array(
        'nivelPermiso' => '1'
      ),
      'CambiarClienteOrden' => array(
        'nivelPermiso' => '1'
      ),
      'EliminarCarga' => array(
        'nivelPermiso' => '1'
      ),
      'GenerarReporteOrtesis' => array(
        'nivelPermiso' => '1'
      ),
      'GuardarFechaEstado' => array(
        'nivelPermiso' => '1'
      ),
      'ConsultarEstadosPaciente' => array(
        'nivelPermiso' => '-2'
      ),
      'Consultaropxid' => array(
        'nivelPermiso' => '1'
      )
    ),
    'agenda' => array(
      'new' => array(
        'nivelPermiso' => '-2'
      ),
      'ConsultarTodasCitas' => array(
        'nivelPermiso' => '-2'
      ),
      'ConsultarDisponibilidadTecnico' => array(
        'nivelPermiso' => '0'
      ),
      'ConsultarCitasEliminar' => array(
        'nivelPermiso' => '0'
      ),
      'EliminarCita' => array(
        'nivelPermiso' => '0'
      )
    ),
    'errores' => array(
      'error401' => array(
        'nivelPermiso' => '-2'
      ),
      'error404' => array(
        'nivelPermiso' => '-2'
      ),
      'error500' => array(
        'nivelPermiso' => '-2'
      )
    ),
    'session' => array(
      'index' => array(
        'nivelPermiso' => '-2'
      ),
      'end' => array(
        'nivelPermiso' => '-2'
      ),
      'start' => array(
        'nivelPermiso' => '-2'
      ),
    ),
    'detalleingreso' => array(
      'index' => array(
        'nivelPermiso' => '1'
      ),
      'edit' => array(
        'nivelPermiso' => '1'
      ),
      'save' => array(
        'nivelPermiso' => '1'
      ),
      'SubirArchivo' => array(
        'nivelPermiso' => '1'
      ),
      'EliminarCarga' => array(
        'nivelPermiso' => '1'
      ),
      'EliminarIngreso' => array(
        'nivelPermiso' => '1'
      ),
    ),
  );




  public function beforeDispatch(Event $event, Dispatcher $dispatcher)
  {
    $controlador = $dispatcher->getControllerName();
    $controlador = strtolower($controlador);
    $accion = $dispatcher->getActionName();
    $action = strtolower($accion);
    $user = $this->session->get('auth');
    if ($user && $controlador !== "index") {
      if(!$controlador || !$accion){
        return TRUE;
      }
      if($user['tipoUsuario'] <= $this->_permiso[$controlador][$accion]['nivelPermiso'] || $this->_permiso[$controlador][$accion]['nivelPermiso'] == -2){
        return TRUE;
      } else {
        return $this->response->redirect('errores/error401');
      }
    } else if($this->_permiso[$controlador][$accion]['nivelPermiso'] == -2) {
      return TRUE;
    } else if($controlador !== "session" && $controlador !== "index") {
      $this->session->set("last_url", str_replace('/cenop/', '', $_SERVER["REQUEST_URI"]));
      return $this->response->redirect('session/index');
    } else {
      return TRUE;
    }
  }
}
