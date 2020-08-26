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
error_reporting(E_ALL);
ini_set('display_errors', true);
//
// Autoloader - Carregar as classes automaticamente, de acordo com o nome delas
spl_autoload_register(function($class) {
    if (file_exists("$class.php")) {
        debug("[$class]");
        require_once "$class.php";
        return true;
    }
});
// Enviar dump de valor para a saída.
function dump($valor) {
	if (is_scalar($valor)) print "<pre>$valor\n</pre>";
	else print "<pre>". var_export($valor, true)."\n</pre>";
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
</head>
    <body>

<?php
//
//  ROTEADOR - Redirecionar para o Controlador que foi solicitado na URL
//
if ($_GET) {
        $controller = isset($_GET['ctl']) ? ((class_exists($_GET['ctl'])) ? new $_GET['ctl'] : null ) : null;
        $method     = isset($_GET['mtd']) ? $_GET['mtd'] : null;
        //$config		= isset($_GET['config']) ? $_GET['config'] : null;
        if ($controller && $method) {
            if (method_exists($controller, $method)) {
                $parameters = $_GET;
                unset($parameters['ctl']); // retirar ctl da lista
                unset($parameters['mtd']); // retirar mtd da lista
                call_user_func(array($controller, $method), $parameters);
                    //               ClassName, MethodName
                    //chamado o (controller e o método), e os parametros 
            } else {
                echo "Método ". $_GET['mtd']. " não encontrado!";
            }
        } else {
            echo "Controller ". $_GET['ctl']. " não encontrado!";
        }
    } else {
        include_once('main.php');	// Caso não seja fornecido o para
                                    // Controller + Method, envia para página inicial
    }
    ?>
</body>
</html>