<?php

/**
* Controller Class
**/

abstract class Controller {
 
 public $model;
 public $view;
 
 public function __construct() {
  $this->view = new View();
 }

 public function action_index() {
  // todo
 }
 
 public function action_error() {
  $this->view->generate('404_view.php', 'template_view.php', "Method doesn't exists");
 }
}
