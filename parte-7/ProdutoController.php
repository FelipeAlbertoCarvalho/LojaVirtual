<?php
/*	UTFPR/CT/DAINF - Disciplina CSM41-Desenvolvimento de Aplicações WEB
	Prof. José Buiar
	
	Framework Exemplo com modelo MVC - Model View Controller

	Controlador ProdutoController - CRUD de Produtos 
	
	1.0 - 18ago20 - Versão Inicial
	1.1 - 24ago20 - Utilizando SQL	
*/
class ProdutoController extends ControllerSql{
// Método para buscar todos os dados
	public $nomeModel='ProdutoModel';
	public $nomeViewDetail='ProdutoViewDetalhe';
	public $nomeViewList='ProdutoViewListaLink';
	public $nomeViewEdit='ProdutoViewEditar';
//
}