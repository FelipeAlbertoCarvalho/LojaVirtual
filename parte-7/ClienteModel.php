<?php
/*	UTFPR/CT/DAINF - Disciplina CSM41-Desenvolvimento de Aplicações WEB
	Prof. José Buiar
	
	Framework Exemplo com modelo MVC - Model View Controller

	ClienteModel - Tratamento dos dados de Cliente em arquivo SQL
	1.0 - 19ago20 - Versão Inicial
	1.1 - 23ago20 - Utilização de MySql
	
*/
class ClienteModel extends ModelSql {
	protected 	$tabela			= 'cliente';
	protected 	$chave			= 'id'; 		
	protected 	$colunas		= array('nome','cpf',
									'telefone','email');
	protected	$colunasString 	= array('nome', 'email');
	protected	$sort 			= array('nome');

}


