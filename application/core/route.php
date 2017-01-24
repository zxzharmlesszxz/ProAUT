<?php

/**
* Route Class
**/

//namespace Core;

class Route {
 static public function start() {
  $routes = explode('/', $_SERVER['REQUEST_URI']);
  $controller_name = 'Controller'.(!empty($routes[1]) ? $routes[1] : 'Main');
  $action_name = 'action_'.(!empty($routes[2]) ? $routes[2] : 'index');
  $model_name = 'Model_'.$controller_name;

  /*
  echo "Model: $model_name <br>";
  echo "Controller: $controller_name <br>";
  echo "Action: $action_name <br>";
  */

  $model_path = config()->MODELS_PATH.'/'.strtolower($model_name).".php";
  include (!file_exists($model_path) ?: $model_path);
  $controller_path = config()->CONTROLLERS_PATH.'/'.strtolower($controller_name).".php";
  include ((!file_exists($controller_path)) ? config()->CONTROLLERS_PATH.'/'."controller_404.php" : $controller_path);
  $controller = class_exists($controller_name) ? new $controller_name : new Controller_404;
  method_exists($controller, $action_name) ? $controller->$action_name() : $controller->action_error();
 }

 public function ErrorPage404() {
  header('HTTP/1.1 404 Not Found');
  header('Status: 404 Not Found');
  header('Location:/404');
 }
}
