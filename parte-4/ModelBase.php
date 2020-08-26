<?php
/*	UTFPR/CT/DAINF - Disciplina CSM41-Desenvolvimento de Aplicações WEB
	Prof. José Buiar
	
	Framework Exemplo com modelo MVC - Model View Controller

	Model Base 1
	
	1.0 - 05ago20 - Versão Inicial
	1.1 - 05ago20 - Modelo CRUD	
*/

class ModelBase {
	protected $dados=array();  // Array contendo os dados 
	protected $chave='id';
	public $ultimoId=0;
//
// Metodo auxiliar para buscar o indice do array correspondente 
// ao registro procurado, de acordo com o campo "ID" fornecido
//	
	public function getKey($procurado=null) {
	// Retornar o indice do registro de dados de acordo com a chave fornecida	
		debug(__CLASS__."::".__FUNCTION__."($procurado)");
		foreach ($this->dados as $indice=>$registro) {
				if ($registro[$this->chave]==$procurado) 
					return $indice;
		}
		return null; // não encontrou
	}		
//	
// CRUD	
//
// CREATE
//
	public function create() {
	// Adiciona um registro na base de dados	
		debug(__CLASS__."::".__FUNCTION__."()");
		print "<p>Executando CREATE</p>";
		$this->ultimoId++;
		$this->dados[] = array(
			'id'	=> $this->ultimoId,
			'nome'	=> $_REQUEST['nome'],
			'data'	=> $_REQUEST['data'],
			'email'	=> $_REQUEST['email']
		);
		return;
	}
//
// READ
//
	public function read($selecionado=null) {
	// Retorna um (ou mais) registros da base de dados
		debug(__CLASS__."::".__FUNCTION__."($selecionado)");
		print "<p>Executando READ</p>";
		if ($selecionado) {
		// Retornar um registro específico
			foreach ($this->dados as $registro) {
				if ($registro[$this->chave]==$selecionado) 
					return $registro;
			}
			
			return null;
		} else {
		// Retornar todos os registros	
			return $this->dados;
		}
	}
//
// UPDATE
//
	public function update($selecionado=null) {
	// Editar um registro da base de dados	
		debug(__CLASS__."::".__FUNCTION__."($selecionado)");
		print "<p>Executando UPDATE</p>";
		if ($chave=$this->getKey($selecionado)) {
			$this->dados[$chave]['nome']	= $_REQUEST['nome'];
			$this->dados[$chave]['data']	= $_REQUEST['data'];
			$this->dados[$chave]['email']	= $_REQUEST['email'];
			return True;
		}
		return False;		
		return;
	}
//
// DELETE
//
	public function delete($selecionado=null) {
	// Remover um registro da base de dados	
		debug(__CLASS__."::".__FUNCTION__."($selecionado)");		
		if ($chave=$this->getKey($selecionado)) {
			unset( $this->dados[$chave] );
			return True;
		}
		return False;
	}	
}

