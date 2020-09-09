<?php

class ControllerIndex extends Controller{

  public function __construct(){
    $this->nomeTemplate= 'TemplateIndex'; //sempre sera este template mas essa view sera sempre essa?
  }

  public function index(){
    $dados = array();
                              //template a ser carregda e depois a view e os dados que seria os banners
    $this->chamarTemplateView('ViewHome'); //agora passar algo para mostrar la na view
    
  }

}