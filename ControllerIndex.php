<?php

class ControllerIndex extends Controller{

  public function __construct(){
    $this->nomeTemplate = 'TemplateIndex'; //sempre sera este template mas essa view sera sempre essa?
  }

  public function index(){
    $this->produto = new ModelProduto();

    $dados = array(
      "dados_produto" => $this->produto->buscar(), 
      "qtd_itens" => 0
    );
    $this->chamarTemplateView('ViewHome', $dados); //agora passar algo para mostrar la na view
    
  }

}