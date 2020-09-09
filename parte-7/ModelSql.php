<?php
/*	UTFPR/CT/DAINF - Disciplina CSM41-Desenvolvimento de Aplicações WEB
	Prof. José Buiar
	
	Framework Exemplo com modelo MVC - Model View Controller

	ModelSql - 	Buscando dados de tabela em gerenciador 
				MariaDB (MySql)
	
	1.0 - 20ago20 - Versão Inicial	
*/
class ModelSql {
	protected	$tabela		=	null;		// nome da tabela
	protected	$colunas	=	array( );	// lista de colunas
	protected	$colunasStr	=	array( );	// lista de colunas String	
	protected	$sort		=	array( );	// colunas para ordenacao
	protected	$chave		=	null;		// coluna chave

	function __construct() {
	// Construtor, obtem uma conexao com o Banco de Dados
		debug(__CLASS__."::".__FUNCTION__."()");
		$this->conexao = Conexao::getInstance();
	}
//
// Retorna o valor recebido preparado para operacoes SQL
//
	protected function preparar($chave, $valor) { 
		if ( in_array( $chave, $this->colunasString ) )
			return $this->conexao->quote($valor);
		return $valor;
	}	
//	
// CRUD	
//
// CREATE
//
// https://www.w3schools.com/sql/sql_insert.asp
//
	public function create($dados) {
	// Adiciona um registro na base de dados	
		debug(__CLASS__."::".__FUNCTION__."()");
		$listaColunas = array();  // preparar lista de colunas
		$listaValues  = array();  // preparar dados a serem inseridos
		foreach ( $this->colunas as $col ) { // Se coluna veio na lista
			if ( isset( $dados[$col] ) ) {
				$listaColunas[] = $col;
				$listaValues[]  = // tratar colunas String ( 'valor' )
					$this->preparar($col,$dados[$col]);
			}			
		}
		$listaColunas = implode(', ', $listaColunas); // concatenar entre ','
		$listaValues  = implode(', ', $listaValues);  // idem
		// Preparar o comando SQL		
		$query = "INSERT INTO $this->tabela ( $listaColunas ) ".
				 "VALUES ( $listaValues )";
		debug($query);
		// Executa comando SQL verificando erro
		try {
            $stmt = $this->conexao->prepare($query);
            return $stmt->execute();
		}
		catch(PDOException $e) {
			alert("Erro em INSERT : ".$e->getMessage());
		}
        return false;
	}
//
// READ
//
// https://www.w3schools.com/sql/sql_select.asp
//
	public function read($selecionado=null) {
	// Retorna um (ou mais) registros da base de dados
		debug(__CLASS__."::".__FUNCTION__."($selecionado)");
		// preparar lista de colunas separadas por ','
		$listaColunas = $this->chave .', '. 
			implode(", ", $this->colunas);
		// caso tenha sido recebida a chave, preparar WHERE
		$listaWhere = $selecionado ?
			" WHERE $this->chave=".$_REQUEST[$this->chave]				
			:  null;
		// verificar comando de ordenação 
		$listaSort = sizeof($this->sort) > 0 ?
			" ORDER BY ".implode(", ",$this->sort) :
			null;
		// preparar a query
		$query = 
			"SELECT $listaColunas FROM $this->tabela ".
			"$listaWhere$listaSort";
		debug($query);
        try {
			$stmt    = $this->conexao->prepare($query);
			$result  = array();
		
			if ($stmt->execute()) {
				while ($rs = $stmt->fetch()) { 
					$result[] = $rs;
				}
			}
		}
		catch(PDOException $e) {
			alert("Erro em SELECT : ".$e->getMessage());
		}
		if ($selecionado == null) return $result;
// caso $selecionado seja fornecido, retorna somente o primeiro
// registro.
		return $result[0];
	}
//
// UPDATE
//
// https://www.w3schools.com/sql/sql_update.asp
//
	public function update($selecionado=null,$dados=null) {
	// Editar um registro da base de dados	
		debug(__CLASS__."::".__FUNCTION__."($selecionado)");
		$listaSet=array();
		// preparar a lista de colunas coluna=valor 
		foreach ( $this->colunas as $col ) {
			if ( isset( $dados[$col] ) )
				$listaSet[] = "$col=".
					$this->preparar($col, $dados[$col]);
					// tratar colunas string
		}
		// concatenar entre ','
		$listaSet = implode(', ', $listaSet);
		// adicionar a chave
		$listaWhere = "$this->chave=$selecionado";
		$query = "UPDATE $this->tabela SET $listaSet WHERE $listaWhere";
		debug($query);
		try {
            $stmt = $this->conexao->prepare($query);
            if ($stmt->execute()) {
                return $stmt->rowCount();
            }
		}
		catch(PDOException $e) {
			alert("Erro em UPDATE : ".$e->getMessage());
		}
        return false;
	}
//
// DELETE
//
// https://www.w3schools.com/sql/sql_delete.asp
//
	public function delete($selecionado=null) {
	// Remover um registro da base de dados	
		debug(__CLASS__."::".__FUNCTION__."($selecionado)");
		$listaWhere = "$this->chave=$selecionado";
		$query = "DELETE FROM $this->tabela WHERE $listaWhere";
		debug($query);
		try {
            $stmt = $this->conexao->prepare($query);
            return $stmt->execute();
		}
		catch(PDOException $e) {
			alert("Erro em DELETE : ".$e->getMessage());
		}
        return false;
	}	
}	
