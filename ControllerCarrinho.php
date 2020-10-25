<?php

class ControllerCarrinho extends Controller{

  private $produto;
  private $usuario;
  private $dados;

  public function __construct(){
    $this->nomeTemplate = 'TemplateCarrinho'; //sempre sera este template mas essa view sera sempre essa?
  }

  public function index(){
    $this->usuario = new ModelUsuario(); 

    if($this->usuario->isLogged()){
      if($_SESSION['qtde_itens_carrinho'] != 0){
        $this->povoarArrayProdutos();
      }
      $this->chamarTemplateView('ViewCarrinho', $this->dados);
    } else {
      header('Location: ' . BASE_URL);
    }
  }

  public function pagar(){

  }

  public function getDados(){
    return $this->dados;
  }

  public function povoarArrayProdutos(){
    $this->produto = new ModelProduto();
    
    $i = 0;
    foreach ($_SESSION['carrinho'] as $key => $value) { 
      $this->dados[$i] = $this->produto->buscarProdutoCarrinho($key);
      $this->dados[$i]['qtde_produto_carrinho'] = $value;
      $i++;
    }

  }

}

?>