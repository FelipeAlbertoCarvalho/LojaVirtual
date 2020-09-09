<?php
/*	UTFPR/CT/DAINF - Disciplina CSM41-Desenvolvimento de Aplicações WEB
	Prof. José Buiar
	
	Framework Exemplo com modelo MVC - Model View Controller

	Controlador Base
	
	Os diversos controladores da aplicação serão herdados desta classe de base
	As funcionalidades comuns devem ser agregadas aqui
	
	1.0 - 05ago20 - Versão Inicial
	1.1 - 05ago20 - Incluido chamada de Model
	1.2 - 05ago20 - Incluido chamada de View e retirada do Botão Voltar
*/
class ControllerBase {
	public $nomeModel;

    public function __construct() {
		debug(__CLASS__."::".__FUNCTION__."()");
		$this->model = new $this->nomeModel;
	}
	
	public function chamarView($nomeView, $info=array()) {
		debug(__CLASS__."::".__FUNCTION__."($nomeView)");
		foreach ($info as $chave=>$valor) {
			$$chave=$info[$chave];
		}
		include "{$nomeView}.php";
	}	
}