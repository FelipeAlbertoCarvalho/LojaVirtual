<?php
/*	UTFPR/CT/DAINF - Disciplina CSM41-Desenvolvimento de Aplicações WEB
	Prof. José Buiar
	
	Framework Exemplo com modelo MVC - Model View Controller

	View para inserir registro novo ou realizar edição
	
	Os dados são apresentados como uma Table HTML
	Para maiores detalhes vide https://www.w3schools.com/html/html_tables.asp
	
	1.0 - 05ago20 - Versão Inicial
	1.1 - 06ago20 - Incluidos botões para editar e excluir
*/
$titulo = $id ? 'Editar' : 'Inserir';
$metodo = $id ? 'atualizar'	: 'salvar';
?>
<?php print $titulo; ?> registro <?php print $id; ?>
<form action='?ctl=<?php print $controller; ?>&mtd=<?php print $metodo; ?>' method='post'>
<table border=1>
<tr>
<th>Nome</th><td><input type='text' name='nome' value='<?php print $dados['nome']; ?>'></td>
</tr>
<tr>
<th>Nascimento</th><td><input type='text' name='data' value='<?php print $dados['data']; ?>'></td>
</tr>
<tr>
<th>e-mail</th><td><input type='text' name='email' value='<?php print $dados['email']; ?>'></td>
</tr>
</table>
<a href='?'>Voltar</a>
&nbsp;
<input type='submit' value='Salvar'>
<?php if ($id) { ?>
<input type='hidden' name='id' value='<?php print $id; ?>'>
<?php } ?>
</form>



