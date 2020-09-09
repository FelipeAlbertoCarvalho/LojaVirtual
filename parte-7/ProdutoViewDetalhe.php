<?php
/*	UTFPR/CT/DAINF - Disciplina CSM41-Desenvolvimento de Aplicações WEB
	Prof. José Buiar
	
	Framework Exemplo com modelo MVC - Model View Controller

	View para mostrar os dados de um registro específico de Pedido
	
	Os dados são apresentados como uma Table HTML
	Para maiores detalhes vide https://www.w3schools.com/html/html_tables.asp
	
	1.0 - 18ago20 - Versão Inicial
*/
?>
<div class='container text-center'>
<div class='row'>
<div class='col-12'>
<h4>Detalhes <small> do registro <?php print $id; ?></small></h4>
<table class='table table-striped'>
<tr>
<th class='text-right'>Código</th><td class='text-left'><?php print $dados['codigo']; ?></td>
</tr>
<tr>
<th class='text-right'>Nome</th><td class='text-left'><?php print $dados['nome']; ?></td>
</tr>
<tr>
<th class='text-right'>Quantidade</th><td class='text-left'><?php print $dados['quantidade']; ?></td>
</tr>
</table>
<a class='btn btn-secondary' href='?'>Voltar</a>
<a class='btn btn-primary' href='?ctl=<?php print $controller; ?>&mtd=editar&id=<?php print $id; ?>'>Editar</a>
<a class='btn btn-danger' href='?ctl=<?php print $controller; ?>&mtd=excluir&id=<?php print $id; ?>' onClick='return confirm("Confirma a Exclusão ?")'>Excluir</a>
</div>
</div>
</div>