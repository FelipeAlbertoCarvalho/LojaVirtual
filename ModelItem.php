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
        $sql = "SELECT rua, cep, cidade, estado, numero, bairro, tudoJunto.* 
                FROM endereco, (
                  SELECT id_pedido, id_produto, id_cliente, titulo, data_pedido,
                        status_pedido, itemPed.preco, quantidade, url_img
                  FROM produto, (
                    SELECT id_pedido, id_produto, quantidade, preco, id_cliente,
                          data_pedido, status_pedido, valor 
                    FROM item, (
                        SELECT * 
                        FROM pedido 
                          WHERE id = $id_pedido
                        ) AS ped 
                        WHERE id_pedido = $id_pedido
                    ) AS itemPed 
                  WHERE produto.id = itemPed.id_produto) AS tudoJunto 
                WHERE endereco.id_pedido = $id_pedido";

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

  public function buscarItensMaisVendidos(){
    $sql = "SELECT id_produto, titulo, count(id_produto) AS contador_produto, 
            sum(item.preco) AS soma 
            FROM item, produto 
            WHERE item.id_produto = produto.id 
            GROUP BY id_produto";
    
    $array = $this->conn->query($sql);

    if ($array->rowCount() > 0) {
      return $array->fetchAll();
    } else {
      return array();
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