<?php
/*	UTFPR/CT/DAINF - Disciplina CSM41-Desenvolvimento de Aplicações WEB
	Prof. José Buiar
	
	Framework Exemplo com modelo MVC - Model View Controller

	Model CSV - Buscando dados em arquivo CSV
	
	Arquivo CSV gerado com http://www.generatedata.com/
	
	1.0 - 05ago20 - Versão Inicial
	1.1 - 05ago20 - Metodos para serem usados pelo CRUD
	
*/
class ModelCSV extends ModelBase {
	// arquivo .CSV usado como base de dados
	public $arquivoCSV='dados.csv';
	
	public function __construct() {
	// Construtor, obtem os dados do arquivo CSV e grava na variavel 'dados'
		debug(__CLASS__."::".__FUNCTION__."()");
		$this->dados = $this->lerCSV();
	}	
	public function lerCSV() {
	// Retorna os dados obtidos do arquivo CSV
		debug(__CLASS__."::".__FUNCTION__."()");
		$lidos=array();
		$linha = 0;
		if (($handle = fopen($this->arquivoCSV, "r")) !== FALSE) {
			while (($valor = fgetcsv($handle, 1000, ";")) !== FALSE) {
				$num = count($valor);
				if ($linha==0) {
					$this->headerCSV=$valor;  
					// guardar para quando for gravar o arquivo
					$colunas=$valor; 
					// obtem nomes de colunas da 1a linha
				} else {
					foreach ($colunas as $indice=>$nome) {
						$lidos[$linha][$nome]=$valor[$indice];
					}
				}
				if ($valor[0]>$this->ultimoId)
					$this->ultimoId=$valor[0];	
					// guarda o maior valor de ID para ser utilizado
					// quando forem adicionados mais regitros (CREATE)
				$linha++;
			}
			fclose($handle);
		}
		return $lidos;
	}

	public function gravarCSV() {
	// Grava os dados no arquivo CSV
		debug(__CLASS__."::".__FUNCTION__."()");
		$buffer=array( implode(";", $this->headerCSV) );
		// primeira linha do arquivo (header)
		foreach ( $this->dados as $linha) {
			$buffer[] = implode(";",$linha);
		}
		// adiciona os registros de 'dados'
		if ( file_put_contents(
				$this->arquivoCSV, 
				// nome do arquivo
				implode("\n",$buffer) 
				// grava com "\n" entre as linhas
			) !== FALSE) {
			return True;
		}
		return False;
	}	
	
//
// CREATE
//
	public function create() {
	// Adiciona um registro na base de dados	
		debug(__CLASS__."::".__FUNCTION__."()");
		parent::create();
		// executa o metodo da classe mãe e depois
		// grava todos os dados no arquivo CSV
		$this->gravarCSV();
		return;
	}	
//
// UPDATE
//
	public function update($selecionado=null) {
	// Editar um registro da base de dados	
		debug(__CLASS__."::".__FUNCTION__."($selecionado)");
		// executa o metodo da classe mãe e depois
		// grava todos os dados no arquivo CSV
		if ( parent::update($selecionado) )
			$this->gravarCSV();	
		return;
	}
//
// DELETE
//
	public function delete($selecionado=null) {
	// Remover um registro da base de dados	
		debug(__CLASS__."::".__FUNCTION__."($selecionado)");
		// executa o metodo da classe mãe e depois
		// grava todos os dados no arquivo CSV
		if ( parent::delete($selecionado) )
			$this->gravarCSV();		
		return;
	}	
}	
