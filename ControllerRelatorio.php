<?php

class ControllerRelatorio extends Controller{

  protected $usuario;       //validacao usuario
  protected $produto;       //usa para fazer inserções, remoçoes, ediçoes

  public function __construct(){
    $this->nomeTemplate = 'TemplateAdmin'; //sempre sera este template mas essa view sera sempre essa?
  }

  public function index(){
    $this->usuario = new ModelUsuario(); 

    if($this->usuario->isLoggedAdmin()){
      $this->pedido = new ModelPedido();
      $dados = $this->pedido->buscarPedido($_SESSION['id_usuario']);
      $this->chamarTemplateView('ViewRelatorio', $dados);

    } else {
      header('Location: ' . BASE_URL);
    }
  }
  
  public function usuariosMaisConsomem(){
    $pedido = new ModelPedido();
    $this->usuario = new ModelUsuario();
    if($this->usuario->isLoggedAdmin()){
    //nao vai ser nesse model , vou ter que fazer um relacionamento
      $dados = $pedido->buscarUsuariosMaisConsomem();
      $this->chamarTemplateView('ViewUsuariosConsomem', $dados); 
    } else {
      header('Location: ' . BASE_URL);
    }
  }

  public function totalVendido(){
    $this->usuario = new ModelUsuario();
    $pedido = new ModelPedido();

    if($this->usuario->isLoggedAdmin()){
    //nao vai ser nesse model , vou ter que fazer um relacionamento
      $dados = $pedido->buscarTotalVendido();
      $this->chamarTemplateView('ViewTotalVendido', $dados); 
    } else {
      header('Location: ' . BASE_URL);
    }
  }

  public function itensMaisVendidos(){
    $item = new ModelItem();
    $this->usuario = new ModelUsuario();
    if($this->usuario->isLoggedAdmin()){
    //nao vai ser nesse model , vou ter que fazer um relacionamento
      $dados = $item->buscarItensMaisVendidos();
      $this->chamarTemplateView('ViewIensMaisVendidos', $dados); 
    } else {
      header('Location: ' . BASE_URL);
    }
  }

  

  public function adiciona(){ //chama view e template para mostrar
    
    $this->usuario = new ModelUsuario();

    if($this->usuario->isLoggedAdmin()) {
      $this->nomeTemplate = 'TemplateAdmin';
      $this->chamarTemplateView('ViewAdicionaProduto');
    } else {
      header('Location: ' . BASE_URL);
    }
    
    
    
  }

  public function adicionar(){ //realiza o cadastro efetivamente
    $this->usuario = new ModelUsuario();
    
    if($this->usuario->isLoggedAdmin()) {
      $this->produto = new ModelProduto();

      $this->produto->setTitulo($_POST['titulo_produto']);
      $this->produto->setDescricao($_POST['descricao_produto']);
      $this->produto->setQtde($_POST['qtde_produto']);
      $this->produto->setpreco($_POST['preco_produto']);
      $this->produto->setCategoria($_POST['categoria_produto']);
      $this->produto->setDesconto($_POST['desconto_produto']);
      $this->produto->setUrl_img($_FILES["url_img_produto"]["name"][0]);
      
      move_uploaded_file($_FILES["url_img_produto"]["tmp_name"][0], "assets/img/" . $this->produto->getUrl_img());
      $retorno = $this->produto->inserirProduto();
      
      if (isset($_FILES["url_img_produto"]) && !empty($_FILES["url_img_produto"]["tmp_name"])) {
        $formatos = array('image/jpg', 'image/jpeg', 'image/png');

        if (count($_FILES["url_img_produto"]["name"]) > 0) {
          for ($c = 0; $c < count($_FILES["url_img_produto"]["name"]); $c++) {
            $this->produto->setUrl_img($_FILES["url_img_produto"]["name"][$c]);
            
            if (in_array($_FILES["url_img_produto"]["type"][$c], $formatos)) {
              move_uploaded_file($_FILES["url_img_produto"]["tmp_name"][$c], "assets/img/" . $this->produto->getUrl_img());
              $this->produto->inserirImagemProduto();
            }
          }  
        }
      }
      
      // $this->produto->setTitulo('osduhsudh');
      // $this->produto->setDescricao('aqui vai a descricaco do produto, o quele tem e tudo mais');
      // $this->produto->setQtde(10);
      // $this->produto->setPreco(19.90);
      // $this->produto->setCategoria('brinquedo');
      // $this->produto->setDesconto(0.00);
      // $this->produto->setUrl_img('vou colocar');
      

      if($retorno > 0){
        header('Location: ' . BASE_URL . '/usuario');
      } else{
        header('Location: ' . BASE_URL . '/produto/adiciona');
      }
      // $this->produto = new ModelProduto();

      // $this->produto->setTitulo($_POST['titulo_produto']);
      // $this->produto->setDescricao($_POST['descricao_produto']);
      // $this->produto->setQtde($_POST['qtde_produto']);
      // $this->produto->setpreco($_POST['preco_produto']);
      // $this->produto->setCategoria($_POST['categoria_produto']);
      // $this->produto->setDesconto($_POST['desconto_produto']);
      // $this->produto->setUrl_img($_POST['url_img_produto']);

      // $this->produto->inserirProduto();

    }else{  //nao está logado
      header('Location: ' . BASE_URL);
    }
  }

  public function altera(){ //mostra todos os produtos cadastrados
    $dados = array();
    $this->usuario = new ModelUsuario();

    if($this->usuario->isLoggedAdmin()) {
      $this->produto = new ModelProduto();

      $dados = $this->produto->buscar();
      $this->nomeTemplate = 'TemplateAdmin';
      $this->chamarTemplateView('ViewAlteraProduto', $dados); 

    } else {
      header('Location: ' . BASE_URL);
    }
  }

  public function alterar($id = null){ //to recebendo da url o id
    $this->usuario = new ModelUsuario();
    
    if($this->usuario->isLoggedAdmin()) {

      if($id != null){   //aqui esta retornando o parametro passado pela url
        $this->produto = new ModelProduto();
        $this->nomeTemplate = 'TemplateAdmin';
        $dados = $this->produto->buscar($id);
        $this->chamarTemplateView('ViewAlterarProduto', $dados); 
      } else {
        $this->produto = new ModelProduto();
        $imgAlterada = 0;

        $this->produto->setId($_POST['id']);
        $this->produto->setTitulo($_POST['titulo_produto']);
        $this->produto->setDescricao($_POST['descricao_produto']);
        $this->produto->setQtde($_POST['qtde_produto']);
        $this->produto->setpreco($_POST['preco_produto']);
        $this->produto->setCategoria($_POST['categoria_produto']);
        $this->produto->setDesconto($_POST['desconto_produto']);

        if (isset($_FILES["url_img_produto"]) && !empty($_FILES["url_img_produto"]["tmp_name"])) {
          $formatos = array('image/jpg', 'image/jpeg', 'image/png');
  
          if (in_array($_FILES["url_img_produto"]["type"], $formatos)) {
              $this->produto->setUrl_img(md5(time() . rand(0, 999)) . ".jpg");
  
              move_uploaded_file($_FILES["url_img_produto"]["tmp_name"], "assets/img/" . $this->produto->getUrl_img());
              $imgAlterada = 1;
          }
        }

        // $this->produto->setTitulo('vej aso que coisa');
        // $this->produto->setDescricao('aqui vai a descricaco do produto, o quele tem e tudo mais');
        // $this->produto->setQtde(10);
        // $this->produto->setPreco(19.90);
        // $this->produto->setCategoria('brinquedo');
        // $this->produto->setDesconto(0.00);
        // $this->produto->setUrl_img('vou colocar');

        $retorno = $this->produto->update($imgAlterada);
        
        if($retorno){
          header('Location: ' . BASE_URL . '/produto/altera');
        } else{
          header('Location: ' . BASE_URL . 'usuario');
        }

      }

    } else {  //nao está logado
      header('Location: ' . BASE_URL);
    }
  } 

  public function deleta(){ //mosra todos os produtos cadastrados
    $this->usuario = new ModelUsuario();

    if($this->usuario->isLoggedAdmin()) {
      $this->produto = new ModelProduto();

      $dados = $this->produto->buscar();
      $this->nomeTemplate = 'TemplateAdmin';
      $this->chamarTemplateView('ViewDeletaProduto', $dados); 

    } else {
      header('Location: ' . BASE_URL);
    }
  }

  public function deletar($id){ //mosra todos os produtos cadastrados
    $this->usuario = new ModelUsuario();

    if($this->usuario->isLoggedAdmin()) {
      $this->produto = new ModelProduto();
      $retorno = $this->produto->deletar($id);

      $pageSuccess = '/produto/deleta';
      $pageNotSuccess = 'usuario';
      $this->encaminhar($retorno, $pageSuccess, $pageNotSuccess);
     
    }
  }

  public function detalhes($id){

      $this->produto = new ModelProduto();
//nao vai ser nesse model , vou ter que fazer um relacionamento
      $dados = $this->produto->buscar($id);

      $this->nomeTemplate = 'TemplateModal';
      $this->chamarModal('ViewConteudoModal', $dados); 
      
      //return json_encode($dados);
    

  }


  public function exibir(){
    $this->usuario = new ModelUsuario();

    if($this->usuario->isLoggedAdmin()){
      $this->produto = new ModelProduto();

      $dados = $this->produto->buscar();
      $this->nomeTemplate = 'TemplateAdmin';
      $this->chamarTemplateView('ViewMostraProduto', $dados); 

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
