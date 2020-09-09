<?php
/*	UTFPR/CT/DAINF - Disciplina CSM41-Desenvolvimento de Aplicações WEB
	Prof. José Buiar
	
	Framework Exemplo com modelo MVC - Model View Controller

	View para mostrar os dados de um registro específico de Produto
	
	Os dados são apresentados como uma Table HTML
	Para maiores detalhes vide https://www.w3schools.com/html/html_tables.asp
	
	1.0 - 18ago20 - Versão Inicial
*/
?>
<div class='container text-center'>
<div class='row'>
<div class='col-12'>
<h4>Detalhes <small> do registro <?php print $id; ?></small></h4>
<table  class='table table-striped'>
<tr>
<th class='text-right'>Nome</th><td class='text-left'><?php print $dados['nome']; ?></td>
</tr>
<tr>
<th class='text-right'>CPF</th><td class='text-left'><?php
if (isset($dados['cpf'])) {
	$cpf=preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $dados['cpf']);
	print $cpf; 
}
6?></td>
</tr>
<tr>
<th class='text-right'>Telefone</th><td class='text-left'><?php 
if (isset($dados['telefone'])) {
	$telefone=preg_replace("/\D/","",$dados['telefone']);
	$telefone=preg_replace("/(\d{2})(\d+)(\d{4})$/", "($1)$2-$3", $telefone);
	print $telefone; 
}
?></td>
</tr>
<tr>
<th class='text-right'>email</th><td class='text-left'><?php print $dados['email']; ?></td>
</tr>
</table>
<a class='btn btn-secondary' href='?'>Voltar</a>
<a class='btn btn-primary' href='?ctl=<?php print $controller; ?>&mtd=editar&id=<?php print $id; ?>'>Editar</a>
<a class='btn btn-danger' href='?ctl=<?php print $controller; ?>&mtd=excluir&id=<?php print $id; ?>' onClick='return confirm("Confirma a Exclusão ?")'>Excluir</a>
</div>
</div>
</div>