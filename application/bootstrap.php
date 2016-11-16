<?php

require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';

/*
Здесь обычно подключаются дополнительные модули, реализующие различный функционал:
 > аутентификацию
 > кеширование
 > работу с формами
 > абстракции для доступа к данным
 > ORM
 > Unit тестирование
 > Benchmarking
 > Работу с изображениями
 > Backup
 > и др.
*/

$config = new Config;
Registry::_set('config', $config);
$database = new MySQL_Database;
Registry::_set('database', $database);

 function __autoload($class){
 include_once __DIR__."/classes/${class}.class.php";
}

function config(){
 return Registry::_get('config');
}

function db(){
 return Registry::_get('database');
}

Route::start(); // запускаем маршрутизатор

?>