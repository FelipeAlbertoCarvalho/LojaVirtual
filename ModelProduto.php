<?php

class ModelProduto extends Model{
  protected $id;
  protected $titulo;
  protected $descricao;
  protected $qtde;
  protected $preco;
  protected $categoria;
  protected $desconto;
  protected $url_img;
  protected $idInserted;

  public function __construct()
  {
    parent::__construct();
  }

  public function inserirImagemProduto(){
    $sql = "INSERT INTO produto_imagem (url_img, id_imagem) VALUES(?,?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(1, $this->getUrl_img());
    $stmt->bindValue(2, $this->idInserted);

    if($stmt->execute()){
      echo 'deu boa';
      return true;
    } else {
      echo 'Deu ruim';
      return false;
    }
  }
  
  public function inserirProduto()
  {
    $sql = "INSERT INTO produto (titulo, descricao, qtde, preco, categoria, desconto, url_img)
            VALUES(?, ?, ?, ?, ?, ?, ?)";

    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(1, $this->getTitulo());
    $stmt->bindValue(2, $this->getDescricao());
    $stmt->bindValue(3, $this->getQtde());
    $stmt->bindValue(4, $this->getPreco());
    $stmt->bindValue(5, $this->getCategoria());
    $stmt->bindValue(6, $this->getDesconto());
    $stmt->bindValue(7, $this->getUrl_img());
    $stmt->execute();

    $this->idInserted = $this->conn->lastInsertId();
  }

  public function buscar($id = null){
    $array = array();

    if ($id == null) { //busca e retorna todos

      $sql = "SELECT *
              FROM produto";

      $array = $this->conn->query($sql);

      if ($array->rowCount() > 0) {
        return $array->fetchAll();
      } else {
        return array();
      }
    } else {
      $sql = "SELECT * FROM 
                (SELECT url_img as url_imagem, id_imagem FROM 
                  produto_imagem 
                WHERE id_imagem = $id) as tabela, produto 
             WHERE produto.id = tabela.id_imagem;";

      $array = $this->conn->query($sql);

      if ($array->rowCount() > 0) {
        return $array->fetchAll();
      }
    }
  }

  public function buscarProdutoCarrinho($id){
    $array = array();
    
    $sql = "SELECT *
              FROM produto 
              WHERE id = $id";

    $array = $this->conn->query($sql);

    if ($array->rowCount() > 0) {
      return $array->fetch();
    } else {
      return array();
    }
    
  }

  public function update($img_alterada){
    
    if($img_alterada){
      $sql = "UPDATE produto
              SET titulo = ?, descricao = ?,
                  qtde = ?, preco = ?,
                  categoria = ?, desconto = ?,
                  url_img = ?
              WHERE id = ?";
      
      $stmt = $this->conn->prepare($sql);
      $stmt->bindValue(1, $this->getTitulo());
      $stmt->bindValue(2, $this->getDescricao());
      $stmt->bindValue(3, $this->getQtde());
      $stmt->bindValue(4, $this->getPreco());
      $stmt->bindValue(5, $this->getCategoria());
      $stmt->bindValue(6, $this->getDesconto());
      $stmt->bindValue(7, $this->getUrl_img());
      $stmt->bindValue(8, $this->getId());
      $retorno = $stmt->execute();

      return $retorno;
    } else {
      $sql = "UPDATE produto
              SET titulo = ?, descricao = ?,
                  qtde = ?, preco = ?,
                  categoria = ?, desconto = ?
              WHERE id = ?";
      
      $stmt = $this->conn->prepare($sql);
      $stmt->bindValue(1, $this->getTitulo());
      $stmt->bindValue(2, $this->getDescricao());
      $stmt->bindValue(3, $this->getQtde());
      $stmt->bindValue(4, $this->getPreco());
      $stmt->bindValue(5, $this->getCategoria());
      $stmt->bindValue(6, $this->getDesconto());
      $stmt->bindValue(7, $this->getId());
      $retorno = $stmt->execute();

      return $retorno;
    }

  }

  public function deletar($id){
    $sql = "DELETE FROM produto
            WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(1, $id);
    $retorno = $stmt->execute();
    
    return $retorno;
  }

  public function setId($id){
    $this->id = $id;
  }

  public function getId(){
    return $this->id;
  }

  public function setTitulo($titulo){
    $this->titulo = $titulo;
  }

  public function getTitulo(){
    return $this->titulo;
  }

  public function setDescricao($descricao){
    $this->descricao = $descricao;
  }

  public function getDescricao(){
    return $this->descricao;
  }

  public function setQtde($qtde){
    $this->qtde = $qtde;
  }

  public function getQtde(){
    return $this->qtde;
  }

  public function setPreco($preco){
    $this->preco = $preco;
  }

  public function getPreco(){
    return $this->preco;
  }

  public function setCategoria($categoria){
    $this->categoria = $categoria;
  }

  public function getCategoria(){
    return $this->categoria;
  }

  public function setDesconto($desconto){
    $this->desconto = $desconto;
  }

  public function getDesconto(){
    return $this->desconto;
  }

  public function setUrl_img($url_img){
    $this->url_img = md5(time() . rand(0, 999) . $url_img . ".jpg");
  }

  public function getUrl_img(){
    return $this->url_img;
  }

}

?>