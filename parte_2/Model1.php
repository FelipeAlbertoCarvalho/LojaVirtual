<?php
/*	UTFPR/CT/DAINF - Disciplina CSM41-Desenvolvimento de Aplicações WEB
	Prof. José Buiar
	
	Framework Exemplo com modelo MVC - Model View Controller

	Model 1 - Exemplo de Utilização 
	
	1.0 - 05ago20 - Versão Inicial
*/
class Model1 extends ModelBase{
// sobrepoe a classe mãe com dados de exemplo
	protected $dados=array(
		array(
			'id'	=>	1,
			'nome'	=>	'João da Silva',
			'email'	=>	'joca@google.com',
		),
		array(
			'id'	=>	2,
			'nome'	=>	'Mariana Oliveira',
			'email'	=>	'marioliva@yahoo.com',
		),
		array(
			'id'	=>	3,
			'nome'	=>	'Danielle Stemberg',
			'email'	=>	'dstemberg@uol.com.br',
		),
		array(
			'id'	=>	4,
			'nome'	=>	'Sérgio Mascarenhas',
			'email'	=>	'mengo67@google.com',			
		),
	);	
}

