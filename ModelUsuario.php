<?php

class ModelUsuario extends Model{
  public $nome;
  public $email;
  public $nascimento;

  public function __construct(){
    parent::__construct();
  }
  
  public function inserirUsuario() {
    $sql = "INSERT INTO usuario (nome, email, senha, nivel)
            VALUES ('{$this->getNome()}','{$this->getEmail()}', '{$this->getSenha()}', {$this->getNivel()})";

    $this->conn->query($sql);

    return $this->conn->lastInsertId();
  }

  public function isLogged() {
    if (isset($_SESSION['nivel']) && !empty($_SESSION['nivel'])) {
      return true;
    } else {
      return false;
    }
  }

  public function getLogin() {
    $sql = "SELECT * 
            FROM usuario
            WHERE email='{$this->getEmail()}'
            AND senha='{$this->getSenha()}'";
 
    $sql = $this->conn->query($sql);

    if ($sql->rowCount() > 0) {
      $sql = $sql->fetch();
      $_SESSION['nivel'] = $sql['nivel'];
      return true;
    } else {
      return false;
    }
  }

  public function deletarUsuario() {
    $sql = "DELETE FROM users WHERE id = {$this->getId()};";
  
      $this->conn->query($sql);
    }
  
    public function setNome($nome){
      $this->nome = $nome;
    }

    public function getNome(){
      return $this->nome;
    }

    public function getId() {
      return $this->id;
    }
  
    public function setId($id) {
      $this->id = $id;
    }
  
    public function getEmail() {
      return $this->email;
    }
  
    public function setEmail($email) {
      $this->email = $email;
    }
  
    public function getSenha() {
      return md5($this->senha);
    }
  
    public function setSenha($senha) {
      $this->senha = $senha;
    }
  
    public function getNivel() {
      return $this->nivel;
    }
  
    public function setNivel($nivel) {
      $this->nivel = $nivel;
    }
  
}
