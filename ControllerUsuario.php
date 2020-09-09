<?php 
class ControllerUsuario extends Controller{
 
  protected $usuario;

  //acho qeu so mudar o nivel depois, isso aqui pe ora carregar
  public function index() {
    $array = array();
    $this->usuario = new ModelUsuario();

    if (isset($_POST['email']) && !empty($_POST['email'])) {
      $this->usuario->setEmail($_POST['email']);
      $this->usuario->setSenha($_POST['senha']);

      if ($this->usuario->getLogin()) { //caso acrescente mais, e queira mudar layout, redirecione aqui tambem
        switch ($_SESSION['nivel']) {
          case 1: $this->nomeTemplate = 'TemplateAdmin';
            $this->chamarTemplateView('ViewAdmin'); 
          break;
          case 2: $this->nomeTemplate = 'TemplateCliente';
            $this->chamarTemplateView('ViewCliente');
          break;
          //vai mais alguns aqui como organizacao-arbitragem, organizacao-time
        }
      } else {        
        header('Location: ' . BASE_URL);
      }
    } elseif ($this->usuario->isLogged()) {
      switch ($_SESSION['nivel']) {
        case 1: $this->nomeTemplate = 'TemplateAdmin';
            $this->chamarTemplateView('ViewAdmin'); 
          break;
          case 2: $this->nomeTemplate = 'TemplateCliente';
            $this->chamarTemplateView('ViewCliente');
          break;
      }
    } else {
      header('Location: ' . BASE_URL);
    }
  }

  public function logout() {
    unset($_SESSION['nivel']); 
    header('Location: ' . BASE_URL);
  }
}
?>