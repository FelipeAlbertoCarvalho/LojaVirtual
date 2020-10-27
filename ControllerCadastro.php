<?php

class ControllerCadastro extends Controller{

  protected $usuario;

  public function __construct(){
    if(isset($_SESSION['nivel'])){
      if($_SESSION['nivel'] == 1)
        $this->nomeTemplate = 'TemplateAdmin';
      else
        $this->nomeTemplate = 'TemplateCliente';
    } else {
      $this->nomeTemplate = 'TemplateCadastro';     //sempre sera este template mas essa view sera sempre essa?
    }
  }
  
  public function index(){
    $dados = array();
    $this->chamarTemplateView('ViewCadastro');    //agora passar algo para mostrar la na view
  }

  public function cadastrar(){
    
    $usuario = new ModelUsuario(); 

    $usuario->setNome($_POST['nome']);
    $usuario->setEmail($_POST['email']);
    $usuario->setSenha($_POST['senha']);
    $usuario->setNascimento($_POST['nascimento']);
    $usuario->setNivel($_POST['nivel']);

    if($usuario->inserirUsuario() == 1){
      //executa um alert em javascript que deu boa de inserir
      header('Location: '. BASE_URL . 'validacao/cadastro'); //resposta de quando inserir

    } else {
      //dar aviso de email ja existente
      $dados['erro'] = "Email Já Existente Favor Adicionar outro";
      $this->nomeTemplate = 'TemplateIndex'; 
      $this->chamarTemplateView('ViewErrorCliente', $dados);
    }
  }

  public function del($id){
    echo $id;
  }
  
}
