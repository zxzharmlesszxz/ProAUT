<?php

/**
* Route Class
**/

class Route {

 static public function start() {
  $controller_name = 'Main';
  $action_name = 'index';
  
  $routes = explode('/', $_SERVER['REQUEST_URI']);

  if (!empty($routes[1])) { 
   $controller_name = $routes[1];
  }
  
  if (!empty($routes[2])) {
   $action_name = $routes[2];
  }

  $model_name = 'Model_'.$controller_name;
  $controller_name = 'Controller_'.$controller_name;
  $action_name = 'action_'.$action_name;

  /*
  echo "Model: $model_name <br>";
  echo "Controller: $controller_name <br>";
  echo "Action: $action_name <br>";
  */

  $model_file = strtolower($model_name).'.php';
  $model_path = "application/models/".$model_file;

  if (file_exists($model_path)) {
   include "application/models/".$model_file;
  }

  $controller_file = strtolower($controller_name).'.php';
  $controller_path = file_exists("application/controllers/".$controller_file) ? "application/controllers/".$controller_file : "application/controllers/controller_404.php";

  include $controller_path;

  $controller = class_exists($controller_name) ? new $controller_name : new Controller_404;

  if (method_exists($controller, $action_name)) {
   $controller->$action();
  } else {
   $controller->action_error();
  }
 }

 public function ErrorPage404() {
  header('HTTP/1.1 404 Not Found');
  header('Status: 404 Not Found');
  header('Location:/404');
 }
}
