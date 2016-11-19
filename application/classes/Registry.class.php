<?php

class Registry{
 static private $store = array();

 protected function __construct(){}
 protected function __clone(){}

 static public function _set($key, $value){
  self::$store[$key] = $value;
 }

 static public function _get($key){
  return isset(self::$store[$key]) ? self::$store[$key] : null;
 }

 static public function _remove($key){
  if(isset(self::$store[$key])){
   unset(self::$store[$key]);
  }
  return TRUE;
 }
}

