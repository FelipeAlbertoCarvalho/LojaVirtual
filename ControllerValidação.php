<?php

class ControllerValidacao extends Controller{

  protected $usuario;

  public function __construct(){
    
  }
  
  public function index(){
    $dados = array();
    $this->chamarTemplateView('ViewCadastro');    //agora passar algo para mostrar la na view
  }

  public function cadastro($id){
    
  }
  
}
