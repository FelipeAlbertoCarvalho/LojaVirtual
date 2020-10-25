<?php

class ControllerCadastro extends Controller{

  protected $usuario;

  public function __construct(){
    $this->nomeTemplate = 'TemplateCadastro';     //sempre sera este template mas essa view sera sempre essa?
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

    $usuario->inserirUsuario();

    $this->chamarTemplateView('viewLogin'); //resposta de quando inserir
  }

  public function del($id){
    echo $id;
  }
  
}
