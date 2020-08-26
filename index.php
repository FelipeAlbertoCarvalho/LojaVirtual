<?php
//aqui eu tenho que colocar os carregador de classes
//ou posso coloc dentro dos codigos das classes? mas se eu nao tenho a classe
//na memoria como eu vou acessar ela?

spl_autoload_register(function($class) {
  if (file_exists("$class.php")) {
  debug("[Instanciando $class]");
      require_once "$class.php";
      return true;
  }
});

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teste para Autoload</title>
</head>
<body>
  tenho que redirecionar pra ca , quando noa digitar nada na url, ja ta indo
</body>
</html>