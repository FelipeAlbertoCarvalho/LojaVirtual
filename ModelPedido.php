<?php 
class ModelPedido extends Model{
  
  private $id;
  private $id_cliente;
  private $data_pedido;
  private $status_pedido;
  private $valor_pedido;

  public function __construct()
  {
    parent::__construct();
  }

  public function inserirPedido(){
    $sql = "INSERT INTO pedido (id_cliente, data_pedido, status_pedido, valor)
            VALUES(?, ?, ?, ?)";
            
    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(1, $this->getId_cliente());
    $stmt->bindValue(2, $this->getDataPedido());
    $stmt->bindValue(3, $this->getStatusPedido());
    $stmt->bindValue(4, $this->getValorPedido());
    $stmt->execute();

    return $this->idInserted = $this->conn->lastInsertId();

  }

  public function buscarPedido($id = null){
    if($id == null){
      $sql = "SELECT *
              FROM pedido";

      $array = $this->conn->query($sql);

      if ($array->rowCount() > 0) {
      return $array->fetchAll();
      } else {
      return array();
      }
    } else {
      $sql = "SELECT *
              FROM pedido
              WHERE id_cliente = $id ORDER BY id DESC";

      $array = $this->conn->query($sql);

      if ($array->rowCount() > 0) {
      return $array->fetchAll();
      } else {
      return array();
      }
    }
  }

  public function buscarPedidoId($id = null){
    if($id == null){
      $sql = "SELECT *
              FROM pedido";

      $array = $this->conn->query($sql);

      if ($array->rowCount() > 0) {
      return $array->fetchAll();
      } else {
      return array();
      }
    } else {
      $sql = "SELECT *
              FROM pedido
              WHERE id = $id";

      $array = $this->conn->query($sql);

      if ($array->rowCount() > 0) {
        return $array->fetch();
      } else {
        return array();
      }
    }
  }

  public function buscarUsuariosMaisConsomem(){
    $sql = "SELECT nome, temp.*
            FROM usuario, (
              SELECT  sum(valor) AS soma_pedido, 
                      count(id) AS qtde_pedido, 
                      id_cliente, pedido.id AS id_ped
              FROM pedido 
              WHERE status_pedido != 'Cancelado'
              GROUP BY id_cliente 
            ) as temp 
            WHERE id = temp.id_cliente
            ORDER BY soma_pedido DESC;";
    
    $array = $this->conn->query($sql);

    if ($array->rowCount() > 0) {
      return $array->fetchAll();
    } else {
      return array();
    }
  }

  public function buscarTotalVendido(){
    $sql = "SELECT sum(valor) as soma_total, 
            count(id) qtde_pedidos 
            FROM pedido";
    
    $array = $this->conn->query($sql);

    if ($array->rowCount() > 0) {
      return $array->fetch();
    } else {
      return array();
    }
  }

  public function update($id){
    $sql = "UPDATE pedido
              SET status_pedido = ?
              WHERE id = ?";
      
      $stmt = $this->conn->prepare($sql);
      // $stmt->bindValue(1, $this->getTitulo());
      // $stmt->bindValue(2, $this->getDescricao());
      $stmt->execute();
  }

  public function updateStatus(){
    $sql = "UPDATE pedido
              SET status_pedido = ?
              WHERE id = ?";
      
      $stmt = $this->conn->prepare($sql);
      $stmt->bindValue(2, $this->getId());
      $stmt->bindValue(1, $this->getStatusPedido());
      $ret = $stmt->execute();
      if($ret == 1){
        return $ret;
      } else {
        return 0;
      }
  }

  public function deletarPedidoCancelado(){

    $sql = "DELETE 
            FROM pedido 
            WHERE id = ? 
            AND status_pedido != 'Cancelado'";

    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(1, $this->getId());

  }

  public function setId($id){
    $this->id = $id;
  }

  public function getId(){
    return $this->id;
  }

  public function setId_cliente($id_cliente){
    $this->id_cliente = $id_cliente;
  }

  public function getId_cliente(){
    return $this->id_cliente;
  }

  public function setDataPedido($data){
    $this->data_pedido = $data;
  }

  public function getDataPedido(){
    return $this->data_pedido;
  }

  public function setStatusPedido($status){
    $this->status_pedido = $status;
  }

  public function getStatusPedido(){
    return $this->status_pedido;
  }

  public function setValorPedido($valor){
    $this->valor_pedido = $valor;
  }

  public function getValorPedido(){
    return $this->valor_pedido;
  }
}
?>