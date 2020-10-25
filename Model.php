<?php
class Model {
  
  protected $conn = null;

  public function __construct() {
    try {
      global $config;
      $this->conn = new PDO(
        'mysql:dbname=' . $config['dbname'] .
        ';host=' . $config['dbhost'], 
        $config['dbuser'], $config['dbpass'] 
      );
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      echo "Erro na conexão..: " . $e->getMessage();
    }
  }

}