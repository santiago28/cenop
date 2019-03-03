<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class ActividadController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for actividad
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Actividad", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "idActividad";

        $actividad = Actividad::find($parameters);
        if (count($actividad) == 0) {
            $this->flash->notice("The search did not find any actividad");

            return $this->dispatcher->forward(array(
                "controller" => "actividad",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $actividad,
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
     * Edits a actividad
     *
     * @param string $idActividad
     */
    public function editAction($idActividad)
    {

        if (!$this->request->isPost()) {

            $actividad = Actividad::findFirstByidActividad($idActividad);
            if (!$actividad) {
                $this->flash->error("actividad was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "actividad",
                    "action" => "index"
                ));
            }

            $this->view->idActividad = $actividad->idActividad;

            $this->tag->setDefault("idActividad", $actividad->idActividad);
            $this->tag->setDefault("idOrden", $actividad->idOrden);
            $this->tag->setDefault("codigo", $actividad->codigo);
            $this->tag->setDefault("version", $actividad->version);
            $this->tag->setDefault("fecha", $actividad->fecha);
            
        }
    }

    /**
     * Creates a new actividad
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "actividad",
                "action" => "index"
            ));
        }

        $actividad = new Actividad();

        $actividad->idOrden = $this->request->getPost("idOrden");
        $actividad->codigo = $this->request->getPost("codigo");
        $actividad->version = $this->request->getPost("version");
        $actividad->fecha = $this->request->getPost("fecha");
        

        if (!$actividad->save()) {
            foreach ($actividad->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "actividad",
                "action" => "new"
            ));
        }

        $this->flash->success("actividad was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "actividad",
            "action" => "index"
        ));

    }

    /**
     * Saves a actividad edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "actividad",
                "action" => "index"
            ));
        }

        $idActividad = $this->request->getPost("idActividad");

        $actividad = Actividad::findFirstByidActividad($idActividad);
        if (!$actividad) {
            $this->flash->error("actividad does not exist " . $idActividad);

            return $this->dispatcher->forward(array(
                "controller" => "actividad",
                "action" => "index"
            ));
        }

        $actividad->idOrden = $this->request->getPost("idOrden");
        $actividad->codigo = $this->request->getPost("codigo");
        $actividad->version = $this->request->getPost("version");
        $actividad->fecha = $this->request->getPost("fecha");
        

        if (!$actividad->save()) {

            foreach ($actividad->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "actividad",
                "action" => "edit",
                "params" => array($actividad->idActividad)
            ));
        }

        $this->flash->success("actividad was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "actividad",
            "action" => "index"
        ));

    }

    /**
     * Deletes a actividad
     *
     * @param string $idActividad
     */
    public function deleteAction($idActividad)
    {

        $actividad = Actividad::findFirstByidActividad($idActividad);
        if (!$actividad) {
            $this->flash->error("actividad was not found");

            return $this->dispatcher->forward(array(
                "controller" => "actividad",
                "action" => "index"
            ));
        }

        if (!$actividad->delete()) {

            foreach ($actividad->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "actividad",
                "action" => "search"
            ));
        }

        $this->flash->success("actividad was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "actividad",
            "action" => "index"
        ));
    }

}
