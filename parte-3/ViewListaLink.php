<?php
/*	UTFPR/CT/DAINF - Disciplina CSM41-Desenvolvimento de Aplicações WEB
	Prof. José Buiar
	
	Framework Exemplo com modelo MVC - Model View Controller

	View para mostrar todos os dados
	
	Os dados são apresentados como uma Table HTML
	Para maiores detalhes vide https://www.w3schools.com/html/html_tables.asp
	
	1.0 - 05ago20 - Versão Inicial
*/?>
Selecione no nome para exibir detalhes
<table border=1>
<tr>
<th>Nome</th>
</tr>
<?php
foreach ($dados as $valor) {
	$url="?ctl=Controller4&mtd=buscar&id=".$valor['id'];
?>	
<tr>
<td><a href='<?php print "$url'>".$valor['nome']; ?></a></td>
</tr>	

<?php	
}
?>
</table>
<a href=?>Voltar</a>