<?php
//aqui eu tenho que colocar os carregador de classes
//ou posso coloc dentro dos codigos das classes? mas se eu nao tenho a classe
//na memoria como eu vou acessar ela?

include_once('config.php');

$core = new Core;
$core->run();