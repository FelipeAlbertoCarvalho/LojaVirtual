<?php

class ControllerEndereco extends Controller{

  private $usuario;
  private $item;
  private $pedido;
  private $endereco;

  public function __construct(){
    $this->nomeTemplate = 'TemplateCliente'; //sempre sera este template mas essa view sera sempre essa?
  }

  public function index(){

    $this->usuario = new ModelUsuario();
    if(!$this->usuario->isLoggedAdmin() && $_SESSION['qtde_itens_carrinho'] > 0){
      $this->endereco = new ModelEndereco();
      $dados = $this->endereco->buscarEndereco($_SESSION['id_usuario']);
      if($dados != null){
        $this->chamarTemplateView('ViewMostraEndereco', $dados); //mostra enderecos preechidos
      } else {
        $this->chamarTemplateView('ViewAdicionaEndereco', $dados);
      }

    // } else if($this->usuario->isLoggedAdmin()){
    //   $this->nomeTemplate = 'TemplateAdmin';
    //   $this->pedido = new ModelPedido();
      
    //   $dados = $this->pedido->buscarPedido();

    //   $this->chamarTemplateView('ViewPedidoAdmin', $dados);
    } else {
      header('Location: ' . BASE_URL . 'carrinho');
    }
  }
  

  public function criarEnderecoEntrega($dadosForm = null){
    
    $this->usuario = new ModelUsuario();
    //
    if($dadosForm == null){
      if ($this->usuario->isLogged()){
        $this->endereco = new ModelEndereco();

        $this->endereco->setId_cliente($_SESSION['id_usuario']);
        $this->endereco->setId_pedido($_SESSION['id_pedido_atual']);
        $this->endereco->setCep($_POST['cep']);
        $this->endereco->setRua($_POST['rua']);
        $this->endereco->setCidade($_POST['cidade']);
        $this->endereco->setNumero($_POST['numero']);
        $this->endereco->setBairro($_POST['bairro']);
        $this->endereco->setEstado($_POST['uf']);
        $this->endereco->setPais('Brasil');
        
        $this->endereco->inserirEndereco();

        //esvaziar carrinho
        //header('Location: ' . BASE_URL . 'pedido/criarPedido');

      } else {
        header('Location: ' . BASE_URL);
      }
    } else {
      if ($this->usuario->isLogged()){
        $this->endereco = new ModelEndereco();

        $this->endereco->setId_cliente($_SESSION['id_usuario']);
        $this->endereco->setId_pedido( $_SESSION['id_pedido_atual']);
        $this->endereco->setCep($dadosForm['cep']);
        $this->endereco->setRua($dadosForm['rua']);
        $this->endereco->setCidade($dadosForm['cidade']);
        $this->endereco->setNumero($dadosForm['numero']);
        $this->endereco->setBairro($dadosForm['bairro']);
        $this->endereco->setEstado($dadosForm['uf']);
        $this->endereco->setPais('Brasil');
        
        $this->endereco->inserirEndereco();

        //esvaziar carrinho
        //header('Location: ' . BASE_URL . 'pedido/criarPedido');

      } else {
        header('Location: ' . BASE_URL);
      }
    }
    
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
