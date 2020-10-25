<?php 
class ModelItem extends Model{
  
  private $id;
  private $id_pedido;
  private $id_produto;
  private $qtde_produto;
  private $preco_produto;

  public function __construct()
  {
    parent::__construct();
  }

  public function inserirItem(){
    $sql = "INSERT INTO item (id_pedido, id_produto, preco, quantidade)
            VALUES(?, ?, ?, ?)";

    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(1, $this->getId_pedido());
    $stmt->bindValue(2, $this->getId_produto());
    $stmt->bindValue(3, $this->getPrecoProduto());
    $stmt->bindValue(4, $this->getQtdeProduto());
    $stmt->execute();

  }

  public function buscarItensPedido($id_pedido = null){
    
    if($id_pedido != null){
      $sql = "SELECT item.id_produto, item.id_pedido, item.preco, pedido.id_cliente,
                      item.quantidade, data_pedido, pedido.valor, 
                      status_pedido, titulo, url_img, rua, numero, 
                      bairro, cidade, cep 
              FROM item, produto, endereco, pedido
              WHERE item.id_produto = produto.id 
                && 
              item.id_pedido = $id_pedido
                &&
              item.id_pedido = endereco.id_pedido";

      $array = $this->conn->query($sql);

      if ($array->rowCount() > 0) {
        return $array->fetchAll();
      } else {
        return array();
      }
    } else {
      $sql = "SELECT * 
              FROM item";

      $array = $this->conn->query($sql);

      if ($array->rowCount() > 0) {
        return $array->fetchAll();
      } else {
        return array();
      }
    }
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

  public function setId_produto($produto){
    $this->id_produto = $produto;
  }

  public function getId_produto(){
    return $this->id_produto;
  }

  public function setQtdeProduto($qtde){
    $this->qtde_produto = $qtde;
  }

  public function getQtdeProduto(){
    return $this->qtde_produto;
  }

  public function setPrecoProduto($preco){
    $this->preco_produto = $preco;
  }

  public function getPrecoProduto(){
    return $this->preco_produto;
  }
}
?>