<?php
/*	UTFPR/CT/DAINF - Disciplina CSM41-Desenvolvimento de Aplicações WEB
	Prof. José Buiar
	
	Framework Exemplo com modelo MVC - Model View Controller

	Model Base 1
	
	1.0 - 05ago20 - Versão Inicial
*/

class ModelBase {
	protected $dados=array();  // Array contendo os dados 
	protected $chave='id';
	
	public function getAll() {
	// Retornar todos os dados obtidos
		debug(__CLASS__."::".__FUNCTION__."()");	
		return $this->dados;
	}
	
	public function get($procurado=null) {
	// Retornar um conjunto de dados de acordo com a chave fornecida	
		debug(__CLASS__."::".__FUNCTION__."($procurado)");
		foreach ($this->dados as $registro) {
				if ($registro[$this->chave]==$procurado) 
					return $registro;
		}
		return null; // não encontrou
	}
}
