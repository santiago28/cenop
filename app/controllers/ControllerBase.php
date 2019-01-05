<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
  protected function initialize()
  {
    $this->tag->prependTitle('Interventoría Buen Comienzo | ');
    $this->view->setTemplateAfter('../index');
  }
}
