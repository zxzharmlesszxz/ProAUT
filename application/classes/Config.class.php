<?php

/**
* Config class
**/

class Config {
 protected $_configFile;
 protected $_configuration;

 public function __construct() {
  $this->_configFile = __DIR__.'/../config/config.inc.php';
  include_once($this->_configFile);
  $this->_configuration = $config;
 }

 final public function __get($key) {
  return isset($this->_configuration[$key]) ? $this->_configuration[$key] : NULL;
 }
}