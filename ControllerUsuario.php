<?php 
class ControllerUsuario extends Controller{
 
  protected $usuario;
  private $produto;

  //acho qeu so mudar o nivel depois, isso aqui pe ora carregar
  public function index() {

    $this->usuario = new ModelUsuario();

    if (isset($_POST['email']) && !empty($_POST['email'])) {
      $this->usuario->setEmail($_POST['email']);
      $this->usuario->setSenha($_POST['senha']);

      if ($this->usuario->getLogin()) { //caso acrescente mais, e queira mudar layout, redirecione aqui tambem
        $this->produto = new ModelProduto();
        
        switch ($_SESSION['nivel']) {
          case 1: 
            $this->nomeTemplate = 'TemplateAdmin';
            $dados = array(
              "dados_produto" => $this->produto->buscar(), 
              "qtd_itens" => 0
            );
            $this->chamarTemplateView('ViewAdmin', $dados); 
          break;
          case 2: 
            //aqui eu tenho qeu recupear o carrinho que esta salvo no bd e mostrar
            //quando ele entrar aqui 
            $this->nomeTemplate = 'TemplateCliente';
            $dados = $this->produto->buscar();
            //$img = $this->produto->buscarImg();
            $dados = array(
              "dados_produto" => $this->produto->buscar(), 
              "qtd_itens" => $this->getTotalItensCarrinho()
            );
            $this->chamarTemplateView('ViewCliente', $dados );
          break;
          //vai mais alguns aqui como organizacao-arbitragem, organizacao-time
        }
      } else {        
        header('Location: ' . BASE_URL);
      }
    } elseif ($this->usuario->isLogged()) { 

      $this->produto = new ModelProduto();

      switch ($_SESSION['nivel']) {
        case 1: 
          $this->nomeTemplate = 'TemplateAdmin';
          $dados = array(
            "dados_produto" => $this->produto->buscar(), 
            "qtd_itens" => 0
          );
          $this->chamarTemplateView('ViewAdmin', $dados); 
        break;
        case 2: 
          if (isset($_GET["addCar"]) && !empty($_GET["addCar"])) {
           
            $idProduto = (int) addslashes($_GET["addCar"]);

            if (!isset($_SESSION['carrinho'])){
              $_SESSION['carrinho'] = array();
              $_SESSION['qtde_itens_carrinho'] = 0;
            }
            if (!isset($_SESSION['carrinho'][$idProduto])){
              $_SESSION['carrinho'][$idProduto] = 1;
              $_SESSION['qtde_itens_carrinho']++;
            } else {
              $_SESSION['carrinho'][$idProduto]++;
              $_SESSION['qtde_itens_carrinho']++;
            }
            print_r($_SESSION['carrinho']); die();
          }
          $this->nomeTemplate = 'TemplateCliente';
          $dados = array(
                    "dados_produto" => $this->produto->buscar(), 
                    "qtd_itens" => $this->getTotalItensCarrinho()
                  );
          $this->chamarTemplateView('ViewCliente', $dados);
        break;
      }
    } else {
      echo ("emitir aviso que precisa logar para fazer compra");
      header('Location: ' . BASE_URL);
    }
  }

  public function getTotalItensCarrinho(){
    $total = 0;
    if(isset($_SESSION['carrinho'])){
      foreach ($_SESSION['carrinho'] as $key => $value) { 
        $total += $value;
      }
    }
    $_SESSION['qtde_itens_carrinho'] = $total;
    return $total;
  }

  public function logout() {
    
    unset($_SESSION['nivel']);

    if(isset($_SESSION['carrinho'])) {
      //salvar no banco de dados o carrinho e jaz

      unset($_SESSION['carrinho']);
    }
    
    header('Location: ' . BASE_URL);
  }

  public function adiciona() {  //chama view e template para mostrar
    
    $this->usuario = new ModelUsuario();

    if($this->usuario->isLogged()) {
      $this->nomeTemplate = 'TemplateAdmin';
      $this->chamarTemplateView('ViewAdicionaUsuario'); 

    } else {
      header('Location: ' . BASE_URL);
    }

  }

  public function adicionar(){
    $this->usuario = new ModelUsuario();
    
    if($this->usuario->isLoggedAdmin()) { 

      $this->usuario->setNome($_POST['nome']);
      $this->usuario->setEmail($_POST['email']);
      $this->usuario->setSenha($_POST['senha']);
      $this->usuario->setNascimento($_POST['nascimento']);
      $this->usuario->setNivel($_POST['nivel']);

      $retorno = $this->usuario->inserirUsuario();

      if($retorno){
        header('Location: ' . BASE_URL . '/usuario/altera');
      } else {
        header('Location: ' . BASE_URL . '/usuario/altera');
      }

    }
    
  }

  public function altera() {  //chama view e template para mostrar
    $dados = array();
    $this->usuario = new ModelUsuario();

    if($this->usuario->isLogged()) {
      $dados = $this->usuario->buscarUsuario();
      $this->nomeTemplate = 'TemplateAdmin';
      $this->chamarTemplateView('ViewAlteraUsuario', $dados); 

    } else {
      header('Location: ' . BASE_URL);
    }

  }

  public function alterar($id = null){
    $this->usuario = new ModelUsuario();

    if($this->usuario->isLoggedAdmin()) {

      if($id != null){
        $dados = $this->usuario->buscarUsuario($id);

        $this->nomeTemplate = 'TemplateAdmin';
        $this->chamarTemplateView('ViewAlterarUsuario', $dados);   
        
      } else {
        $this->usuario->setNome($_POST['nome']);
        $this->usuario->setEmail($_POST['email']);
        $this->usuario->setNascimento($_POST['nascimento']);
        $this->usuario->setId($_POST['id']);

        if($_POST['senha'] != ''){
          $this->usuario->setSenha($_POST['senha']);
          $retorno = $this->usuario->updateUsuario(1);
        } else {
          $retorno = $this->usuario->updateUsuario(0);
        }
        
        if($retorno){
          header('Location: ' . BASE_URL . '/usuario/altera');
        } else {
          header('Location: ' . BASE_URL . '/usuario/altera');
        }
      }
    } else {
      header('Location: ' . BASE_URL);
    }

  }

  public function deleta() {  //chama view e template para mostrar
    
    $this->usuario = new ModelUsuario();

    if($this->usuario->isLoggedAdmin()) {
      $dados = $this->usuario->buscarUsuario();
      $this->nomeTemplate = 'TemplateAdmin';
      $this->chamarTemplateView('ViewDeletaUsuario', $dados); 

    } else {
      header('Location: ' . BASE_URL);
    }

  }

  public function deletar($id){
    $this->usuario = new ModelUsuario();
    
    if($this->usuario->isLoggedAdmin()) {

      $retorno = $this->usuario->deletarUsuario($id);

      $pageSuccess = '/usuario/deleta';
      $pageNotSuccess = 'usuario';
      $this->encaminhar($retorno, $pageSuccess, $pageNotSuccess);
     
    }
  }

  public function encaminhar($ret, $page, $pageNotSuc){
    if($ret){
      header('Location: ' . BASE_URL . $page);
    } else{
      header('Location: ' . BASE_URL . $pageNotSuc);
    }
  }
}
?>