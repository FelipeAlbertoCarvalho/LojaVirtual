<?php
/*	UTFPR/CT/DAINF - Disciplina CSM41-Desenvolvimento de Aplicações WEB
	Prof. José Buiar
	
	Framework Exemplo com modelo MVC - Model View Controller

	ProdutoModel - Tratamento dos dados de Produto em arquivo SQL
	
	1.0 - 19ago20 - Versão Inicial
	1.1 - 23ago20 - Utilização de MySql	
	
*/
class ProdutoModel extends ModelSql {
	public 		$tabela			= 'produto';
	protected 	$chave			= 'id'; 		 
	protected 	$colunas		= array('codigo', 'nome', 'quantidade');	
	protected	$colunasString 	= array('codigo', 'nome');
	protected	$sort 			= array('nome', 'codigo');	
}
