<?php

class ModelUsuario extends Model
{
  public $nome;
  public $email;
  public $nascimento;
  public $id;
  public $senha;

  public function __construct()
  {
    parent::__construct();
  }

  public function inserirUsuario()
  {
    $sql = "INSERT INTO usuario (nome, email, senha, nivel, nascimento)
            VALUES(?, ?, ?, ?, ?)";

    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(1, $this->getNome(), PDO::PARAM_STR);
    $stmt->bindValue(2, $this->getEmail(), PDO::PARAM_STR);
    $stmt->bindValue(3, $this->getSenha());
    $stmt->bindValue(4, $this->getNivel());
    $stmt->bindValue(5, $this->getNascimento());
    $retorno = $stmt->execute();
    // return $this->conn->lastInsertId();
    return $retorno;
  }

  public function isLogged()
  {
    if (isset($_SESSION['nivel']) && !empty($_SESSION['nivel'])) {
      return true;
    } else {
      return false;
    }
  
  }
  
  public function isLoggedAdmin()
  {
    if ($_SESSION['nivel'] == 1 && !empty($_SESSION['nivel'])) {
      return true;
    } else {
      return false;
    }
  }

  public function getLogin()
  {
    $sql = "SELECT * 
            FROM usuario
            WHERE email='{$this->getEmail()}'
            AND senha='{$this->getSenha()}'";

    $sql = $this->conn->query($sql);

    if ($sql->rowCount() > 0) {
      $sql = $sql->fetch();
      $_SESSION['nivel'] = $sql['nivel'];
      $_SESSION['id_usuario'] = $sql['id'];
      return true;
    } else {
      return false;
    }
  }

  public function deletarUsuario($id)
  {
    $sql = "DELETE FROM usuario WHERE id = {$id};";

    $retorno = $this->conn->query($sql);

    return $retorno;
  }

  public function buscarUsuario($id = null)
  {
    $array = array();

    if ($id == null) { //busca e retorna todos

      $sql = "SELECT * FROM usuario";

      $array = $this->conn->query($sql);

      if ($array->rowCount() > 0) {
        return $array->fetchAll();
      }
    } else {
      $sql = "SELECT * FROM usuario WHERE id = '{$id}'";

      $array = $this->conn->query($sql);

      if ($array->rowCount() > 0) {
        return $array->fetch();
      }
    }
  }

  public function updateUsuario($senhaAlterar)
  {
    if($senhaAlterar){
      $sql = "UPDATE usuario 
              SET nome = :nome, email = :email, nascimento = :nascimento, senha = :senha
              WHERE id = :id";

      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":nome", $this->nome);
      $stmt->bindParam(":email", $this->email);
      $stmt->bindParam(":nascimento", $this->nascimento);
      $senha = $this->getSenha();
      $stmt->bindParam(":senha", $senha);
      $stmt->bindParam(":id", $this->id);
      $stmt->execute();
    } else {
      $sql = "UPDATE usuario 
              SET nome = :nome, email = :email, nascimento = :nascimento
              WHERE id = :id";

      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":nome", $this->nome);
      $stmt->bindParam(":email", $this->email);
      $stmt->bindParam(":nascimento", $this->nascimento);
      $stmt->bindParam(":id", $this->id);
      $stmt->execute();
    }
  }

  public function setNome($nome)
  {
    $this->nome = $nome;
  }

  public function getNome()
  {
    return $this->nome;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function getSenha()
  {
    return md5($this->senha);
  }

  public function setSenha($senha)
  {
    $this->senha = $senha;
  }

  public function getNascimento()
  {
    return $this->nascimento;
  }

  public function setNascimento($nascimento)
  {

    $this->nascimento = $nascimento;
  }

  public function getNivel()
  {
    return $this->nivel;
  }

  public function setNivel($nivel)
  {
    $this->nivel = $nivel;
  }
}
