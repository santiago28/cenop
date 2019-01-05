<?php

class IndexController extends ControllerBase
{
  public function initialize()
  {
    $this->user = $this->session->get('auth');
    parent::initialize();
    $this->view->setTemplateAfter('../index');
  }

  public function indexAction()
  {

  }

}
