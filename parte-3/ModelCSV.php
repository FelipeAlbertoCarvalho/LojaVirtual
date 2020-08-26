<?php
/*	UTFPR/CT/DAINF - Disciplina CSM41-Desenvolvimento de Aplicações WEB
	Prof. José Buiar
	
	Framework Exemplo com modelo MVC - Model View Controller

	Model CSV - Buscando dados em arquivo CSV
	
	Arquivo CSV gerado com http://www.generatedata.com/
	
	1.0 - 05ago20 - Versão Inicial
*/
class ModelCSV extends ModelBase{
	public $arquivoCSV='dados.csv';

	
	public function __construct() {
	// Construtor, obtem os dados do arquivo CSV
		debug(__CLASS__."::".__FUNCTION__."()");
		$this->dados = $this->lerCSV( $this->arquivoCSV );
	}
	
	public function lerCSV($nomeArquivo) {
	// Retorna os dados obtidos em um arquivo CSV
		debug(__CLASS__."::".__FUNCTION__."()");
		$lidos=array();
		$linha = 0;
		if (($handle = fopen($nomeArquivo, "r")) !== FALSE) {
			while (($valor = fgetcsv($handle, 1000, ";")) !== FALSE) {
				$num = count($valor);
				if ($linha==0) {
					$colunas=$valor; // obtem nomes de colunas da 1a linha
				} else {
					foreach ($colunas as $indice=>$nome) {
						$lidos[$linha][$nome]=$valor[$indice];
					}
				}
				$linha++;
			}
			fclose($handle);
		}
		return $lidos;
	}
}

