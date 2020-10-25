<?php 
class ModelEndereco extends Model{
  
  private $id;
  private $id_pedido;
  private $id_cliente;
  private $rua;
  private $cep;
  private $cidade;
  private $bairro;
  private $estado;
  private $pais;
  private $numero;


  public function __construct()
  {
    parent::__construct();
  }

  public function inserirEndereco(){
    $sql = "INSERT INTO endereco (id_cliente, id_pedido, rua, cep, cidade, estado, pais, numero, bairro)
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(1, $this->getId_cliente());
    $stmt->bindValue(2, $this->getId_pedido());
    $stmt->bindValue(3, $this->getRua());
    $stmt->bindValue(4, $this->getCep());
    $stmt->bindValue(5, $this->getCidade());
    $stmt->bindValue(6, $this->getEstado());
    $stmt->bindValue(7, $this->getPais());
    $stmt->bindValue(8, $this->getNumero());
    $stmt->bindValue(9, $this->getBairro());
    
    $stmt->execute();

  }

  public function buscarEndereco($id = null){
    
    if($id == null){
      $sql = "SELECT *
              FROM endereco";

      $array = $this->conn->query($sql);

      if ($array->rowCount() > 0) {
      return $array->fetchAll();
      } else {
      return array();
      }

    } else {
      $sql = "SELECT *
              FROM endereco
              WHERE id_cliente = $id";

      $array = $this->conn->query($sql);

      if ($array->rowCount() > 0) {
      return $array->fetchAll();
      } else {
      return array();
      }

    }
  
  }

  public function setBairro($bairro){
    $this->bairro = $bairro;
  }

  public function getBairro(){
    return $this->bairro;
  }

  public function setId($id){
    $this->id = $id;
  }

  public function getId(){
    return $this->id;
  }

  public function setId_pedido($id_pedido){
    $this->id_pedido = $id_pedido;
  }

  public function getId_pedido(){
    return $this->id_pedido;
  }

  public function setId_cliente($id_cliente){
    $this->id_cliente = $id_cliente;
  }

  public function getId_cliente(){
    return $this->id_cliente;
  }

  public function setRua($rua){
    $this->rua = $rua;
  }

  public function getRua(){
    return $this->rua;
  }

  public function setCep($cep){
    $this->cep = $cep;
  }

  public function getCep(){
    return $this->cep;
  }
  
  public function setCidade($cidade){
    $this->cidade = $cidade;
  }

  public function getCidade(){
    return $this->cidade;
  }

  public function setEstado($estado){
    $this->estado = $estado;
  }

  public function getEstado(){
    return $this->estado;
  }

  public function setPais($pais){
    $this->pais = $pais;
  }

  public function getPais(){
    return $this->pais;
  }

  public function setNumero($numero){
    $this->numero = $numero;
  }

  public function getNumero(){
    return $this->numero;
  }
}
?>