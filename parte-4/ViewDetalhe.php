<?php
/*	UTFPR/CT/DAINF - Disciplina CSM41-Desenvolvimento de Aplicações WEB
	Prof. José Buiar
	
	Framework Exemplo com modelo MVC - Model View Controller

	View para mostrar os dados de um registro específico
	
	Os dados são apresentados como uma Table HTML
	Para maiores detalhes vide https://www.w3schools.com/html/html_tables.asp
	
	1.0 - 05ago20 - Versão Inicial
	1.1 - 06ago20 - Incluidos botões para editar e excluir
*/?>
Detalhes do registro <?php print $id; ?>
<table border=1>
<tr>
<th>Nome</th><td><?php print $dados['nome']; ?></td>
</tr>
<tr>
<th>Nascimento</th><td><?php print $dados['data']; ?></td>
</tr>
<tr>
<th>e-mail</th><td><?php print $dados['email']; ?></td>
</tr>
</table>
<a href='?'>Voltar</a>
&nbsp;
<a href='?ctl=<?php print $controller; ?>&mtd=editar&id=<?php print $id; ?>'>Editar</a>
&nbsp;
<a href='?ctl=<?php print $controller; ?>&mtd=excluir&id=<?php print $id; ?>'>Excluir</a>