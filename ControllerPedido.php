<?php

class ControllerPedido extends Controller{

  private $usuario;
  private $item;
  private $pedido;
  private $endereco;

  public function __construct(){
    $this->nomeTemplate = 'TemplateCliente'; //sempre sera este template mas essa view sera sempre essa?
  }

  public function index(){
    //mostrar seus pedidos , se ele tiver
    //é qusae a mesma coisa que mostra o carrinho la mas dai eu mostro apenas 
    //algumas coisa ou todas com o pedido fechado?
    $this->usuario = new ModelUsuario(); 

    if(!$this->usuario->isLoggedAdmin()){
      $this->pedido = new ModelPedido();
      $dados = $this->pedido->buscarPedido($_SESSION['id_usuario']);
      $this->chamarTemplateView('ViewPedido', $dados);

    } else if($this->usuario->isLoggedAdmin()){
      $this->nomeTemplate = 'TemplateAdmin';
      $this->pedido = new ModelPedido();
      
      $dados = $this->pedido->buscarPedido();

      $this->chamarTemplateView('ViewPedidoAdmin', $dados);
    } else {
      header('Location: ' . BASE_URL);
    }
  }
  
  public function criarPedido($valor = null){
    $this->usuario = new ModelUsuario();
    
    if ($this->usuario->isLogged()){
      $this->pedido = new ModelPedido();

      $this->pedido->setId_cliente($_SESSION['id_usuario']);
      $this->pedido->setValorPedido($_SESSION['total_pedido']);
      $this->pedido->setStatusPedido('Em Aberto - Pagamento não Efetuado');
      $this->pedido->setDataPedido(date('Y/m/d'));
      
      $retorno = $this->pedido->inserirPedido();
      $_SESSION['id_pedido_atual'] = $retorno;
      
      $this->item = new ModelItem();
      $this->controllerCarrinho = new ControllerCarrinho();
      $this->controllerCarrinho->povoarArrayProdutos();
      $dados = $this->controllerCarrinho->getDados();
            
      //tenho qe executar algumas vezes ate guardar tudo
      foreach ($dados as $dado){
        $this->item->setId_pedido($retorno);
        $this->item->setId_produto($dado['id']);
        $this->item->setQtdeProduto($dado['qtde_produto_carrinho']);
        $this->item->setPrecoProduto($dado['preco']);
        
        $this->item->inserirItem();
      }
     
      $controllerEnde = new ControllerEndereco();
      $controllerEnde->criarEnderecoEntrega($_REQUEST);

      //esvaziar carrinho
      $_SESSION['carrinho'] = array();
      $_SESSION['qtde_itens_carrinho'] = 0;

      header('Location: ' . BASE_URL . 'pedido');

    } else {
      header('Location: ' . BASE_URL);
    }
    
    
  }

  public function detalhes($id_pedido = null){
    $item = new ModelItem();
    $this->pedido = new ModelPedido();

    $dados = $item->buscarItensPedido($id_pedido);

    $this->chamarTemplateView('ViewPedidoDetalhes', $dados);
  }

  public function pedidoRealizado(){
    //aqui eu mostro o status do pedido, eu mostro tudo dos pedidos aqui 
    //busco ele no model e passa pra uma iew mostrar ele estilizado

  }

  public function altera(){
  //lista apenas aquele pedido e pode alterar o status
  }

  public function alterar(){

  }

  public function deleta(){

  }

  public function deletar(){

  }

  public function salvarStatus($id){
    
  }

}
