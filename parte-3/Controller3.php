<?php
/*	UTFPR/CT/DAINF - Disciplina CSM41-Desenvolvimento de Aplicações WEB
	Prof. José Buiar
	
	Framework Exemplo com modelo MVC - Model View Controller

	Controlador 3 - Exemplo de Utilização 
	
	1.0 - 0paint
	5ago20 - Versão Inicial
r
*/
class Controller3 extends ControllerBase {
// Método para buscar todos os dados
	public $nomeModel='ModelCSV';
	public $nomeViewListar='ViewLista';
	public $nomeViewBuscar='ViewDetalhe';
	
	public function listar() {
		debug(__CLASS__."::".__FUNCTION__."()");
		$model = new $this->nomeModel();
		$dados = $model->getAll();
		debug($dados);  // debug dos dados 
// Preparar dados e chamar a View
		$this->chamarView($this->nomeViewListar,array(
			'dados'	=>	$dados,
		));
	}
// Método para buscar um dado específico
	public function buscar() {
		debug(__CLASS__."::".__FUNCTION__."()");
		$model = new $this->nomeModel();
		$id=$_REQUEST['id'];
		$dados = $model->get($id); 
// https://www.php.net/manual/pt_BR/reserved.variables.request.php
		debug($dados);  // debug dos dados 
// Preparar dados e chamar a View		
		$this->chamarView($this->nomeViewBuscar,array(
			'dados'	=>	$dados,
			'id'	=> $id,
		));
	}
}