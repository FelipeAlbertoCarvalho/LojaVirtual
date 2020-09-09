<?php

class ControllerProduto extends Controller{



  public function index(){
    //tenho que saber quemmostrar aqui entao eu depende de alguem para ver quem fpi clicado
  }
  
  public function adicionar(){ //chamar o template e a view de cadastro
    $this->nomeTemplate = 'TemplateAdmin';
    $this->chamarTemplateView('ViewCadastroProduto');
  }

  public function editar(){ //mostra todos os produtos cadastrados

  }

  public function deletar(){ //mosra todos os produtos cadastrados

  }

  public function buscar(){ //retorna todos os produtos sem view por enquanto

  }


}
