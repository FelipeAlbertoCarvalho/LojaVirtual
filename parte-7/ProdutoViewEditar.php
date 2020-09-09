<?php
/*	UTFPR/CT/DAINF - Disciplina CSM41-Desenvolvimento de Aplicações WEB
	Prof. José Buiar
	
	Framework Exemplo com modelo MVC - Model View Controller

	View para inserir Produto  novo ou realizar edição
	
	Os dados são apresentados como uma Table HTML
	Para maiores detalhes vide https://www.w3schools.com/html/html_tables.asp
	
	1.0 - 18ago20 - Versão Inicial		
*/
$titulo 	= $id 	? 'Editar' 				: 'Inserir';
$metodo 	= $id 	? 'atualizar'			: 'Salvar';
$codigo 	= isset($dados['codigo']) 		? $dados['codigo'] 		: null;
$nome 		= isset($dados['nome'])			? $dados['nome'] 		: null;
$quantidade = isset($dados['quantidade'])	? $dados['quantidade']	: null;
?>
<form action='?ctl=<?php print $controller; ?>&mtd=<?php print $metodo; ?>' method='post'>
<div class='container text-center'>
<div class='row'>
<div class='col-12'>
<h4><?php print $titulo; ?><small> registro <?php print $id; ?></small></h4>
<table class='table table-striped'>
<tr>
<th class='text-right'>Código</th>
<td><input  class='form-control' type='text' name='codigo' value='<?php print $codigo; ?>'
placeholder="numérico" pattern="\d*"></td>
</tr>
<tr>
<th class='text-right'>Nome</th>
<td><input  class='form-control' type='text' name='nome' value='<?php print $nome; ?>'
placeholder="xxxxx xxxxx" ></td>
</tr>
<tr>
<th class='text-right'>Quantidade</th>
<td><input  class='form-control' type='text' name='quantidade' value='<?php print $quantidade; ?>'
placeholder="numérico" pattern="\d*"></td>
</tr>
</table>
<a class='btn btn-secondary' href='?'>Voltar</a>
<input class='btn btn-primary' type='submit' value='Salvar'>
<?php if ($id) { ?>
<input type='hidden' name='id' value='<?php print $id; ?>'>
<?php } ?>
</div>
</div>
</div>
</form>
