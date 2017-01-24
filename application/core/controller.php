<?php

namespace Core;

/**
* Controller Class
* Type: abstract
**/

abstract class Controller {
 
 public $model;
 public $view;
 
 public function __construct() {
  $this->view = new View();
 }

 abstract public function action_index();
 
 public function action_error() {
  $this->view->generate('404_view.php', 'template_view.php', "Method doesn't exists");
 }
}
