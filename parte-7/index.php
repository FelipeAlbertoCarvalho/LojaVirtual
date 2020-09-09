<?php
/*	UTFPR/CT/DAINF - Disciplina CSM41-Desenvolvimento de Aplicações WEB
	Prof. José Buiar
	
	Framework Exemplo com modelo MVC - Model View Controller

	Roteador
	
	1.0 - 05ago20 - Versão Inicial
*/
//
// Habilitar que todas as mensagens de erros sejam direcionadas para 
// a saída (browser).
//	Em ambiente de produção deve ser desabilitado.
//
// Definicoes de arquivos auxiliares
$arquivoPaginaPrincipal='main.php';
$arquivoBarraNavegacao='BarraNavegacao.php';
$arquivoRodape='Rodape.php';

error_reporting(E_ALL);
ini_set('display_errors', true);
//
// Autoloader - Carregar as classes automaticamente, de acordo com o nome delas
spl_autoload_register(function($class) {
    if (file_exists("$class.php")) {
		debug("[Instanciando $class]");
        require_once "$class.php";
        return true;
    }
});
// Enviar dump de valor para a saída.
function dump($valor) {
	if (is_scalar($valor)) print "<pre>$valor\n</pre>";
	else print "<pre>". var_export($valor, true)."\n</pre>";
}
// Enviar mensagem de alerta para a saída.
function alert($valor, $classe='bg-warning') {
	if ($classe) $classe=" class='$classe'";
	if (is_scalar($valor)) print "<div$classe>$valor\n</div>";
	else print "<div$classe>". var_export($valor, true)."\n</div>";
}
// Enviar mensagens de depuração para a saída.
function debug($valor) {
// Comentar a linha abaixo para mostrar as mensagens de debug
	return; 
	dump($valor);
}
?>
<!DOCTYPE html>
<html lang='pt-br'>
<head>
<title>Exemplo de MVC</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
<?php

if (file_exists($arquivoBarraNavegacao)) {
	include_once($arquivoBarraNavegacao);
}
//
//  ROTEADOR - Redirecionar para o Controlador que foi solicitado na URL
//
if ($_GET) {
            $controller = isset($_GET['ctl']) ? ((class_exists($_GET['ctl'])) ? new $_GET['ctl'] : NULL ) : null;
            $method     = isset($_GET['mtd']) ? $_GET['mtd'] : null;
            //$config		= isset($_GET['config']) ? $_GET['config'] : null;
			if ($controller && $method) {
                if (method_exists($controller, $method)) {
                    $parameters = $_GET;
                    unset($parameters['ctl']);
                    unset($parameters['mtd']);
                    call_user_func(array($controller, $method), $parameters);
                } else {
                    echo "Método ". $_GET['mtd']. " não encontrado!";
                }
            } else {
                echo "Controller ". $_GET['ctl']. " não encontrado!";
            }
        } else {
// Caso não seja fornecido o Controller na chamada (url) então...			
			
// Se existir a PaginaPrincial então esta é carregada
				if (file_exists($arquivoPaginaPrincipal))
					include_once($arquivoPaginaPrincipal);
		}
//
if (file_exists($arquivoRodape)) {
	include_once($arquivoRodape);
}
?>	
</body>
</html>