<?php
class Core
{

  public function run()
  {

    //$url = explode('index.php', $_SERVER['PHP_SELF']);  //tira o index.php
    //$url = end($url);                                   //pega so o final da url que de inicio é vazio
    $params = array();
    $url = "/";
    $url .= (!empty($_GET["url"])) ? $_GET["url"] : "";
    if (!empty($url) && $url != "/") {   //se nao é vazio
      $url = explode('/', $url);    //tira o / e pega o restante
      
      array_shift($url);            //pega o primeiro elemento do array
      
      $currentController = 'Controller' . $url[0];
      
      array_shift($url);
      
      if (isset($url[0]) && !empty($url[0])) {
        $currentAction = $url[0];
        array_shift($url);
      } else {
        $currentAction = 'index';
      }
      
      
      if (count($url) > 0) {
        $params = $url;
      }
    } else {
      $currentController = 'ControllerIndex';  //carregar a pagina inicial
      $currentAction = 'index';
    }
    
    require_once('Controller.php');
    
    $current = new $currentController();
    //classe , metodo
    
    //var_dump($current); die();
    call_user_func_array(array($current, $currentAction), $params);
  }
}
