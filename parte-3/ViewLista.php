<?php
/*	UTFPR/CT/DAINF - Disciplina CSM41-Desenvolvimento de Aplicações WEB
	Prof. José Buiar
	
	Framework Exemplo com modelo MVC - Model View Controller

	View para mostrar todos os dados
	
	Os dados são apresentados como uma Table HTML
	Para maiores detalhes vide https://www.w3schools.com/html/html_tables.asp
	
	1.0 - 05ago20 - Versão Inicial
*/
?>
<table border=1>
<tr>
<th>Nome</th>
<th>Nascimento</th>
<th>e-mail</th>
</tr>
<?php
foreach ($dados as $valor) {
?>	
<tr>
<td><?php print $valor['nome']; ?></td>
<td><?php print $valor['data']; ?></td>
<td><?php print $valor['email']; ?></td>
</tr>	

<?php	
}
?>
</table>
<a href=?>Voltar</a>