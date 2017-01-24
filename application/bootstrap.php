<?php
use Core;
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';

$config = Core\Config::getInstance();
Registry::_set('config', $config);
$database = new Database\MySQL_Database;
Registry::_set('database', $database);

function __autoload($class){
 @include_once __DIR__."/classes/${class}.class.php";
}

function config(){
 return Core\Registry::_get('config');
}

function db(){
 return Core\Registry::_get('database');
}

Core\Route::start();
