<?php
/*	UTFPR/CT/DAINF - Disciplina CSM41-Desenvolvimento de Aplicações WEB
	Prof. José Buiar
	
	Framework Exemplo com modelo MVC - Model View Controller

	Controlador 1 - Exemplo de Utilização 
	
	1.0 - 05ago20 - Versão Inicial
	1.0 - 05ago20 - Chamada de Model
*/
class Controller1 extends ControllerBase {
// Método para buscar todos os dados
	public $nomeModel='Model1';
	public function listar() {
		debug(__CLASS__."::".__FUNCTION__."()");
		print "<p>Mostrando os dados obtidos</p>";
		$model = new $this->nomeModel();
		$dados = $model->getAll();
		dump($dados);  // dump da variável 
		$this->botaoVoltar();
	}
// Método para buscar um dado específico
	public function buscar() {
		debug(__CLASS__."::".__FUNCTION__."()");
		print "<p>Mostrando os dados obtidos</p>";
		$model = new $this->nomeModel();
		$dados = $model->get($_REQUEST['id']); 
// https://www.php.net/manual/pt_BR/reserved.variables.request.php
		dump($dados);  // dump da variável 
		$this->botaoVoltar();
	}
}