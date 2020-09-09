<?php

define('BASE_URL', 'http://localhost/LojaVirtual/');

session_start();

spl_autoload_register(function($class) {
  if (file_exists("$class.php")) {
      require_once "$class.php";
      return true;
  }
});

$config = array();
  $config["dbname"] = "lojavirtual";
  $config["dbhost"] = "localhost";
  $config["dbuser"] = "root";
  $config["dbpass"] = ""; 

//$core = new Core;
//$core->run();