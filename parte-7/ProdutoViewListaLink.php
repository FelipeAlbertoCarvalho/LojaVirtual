<?php
/*	UTFPR/CT/DAINF - Disciplina CSM41-Desenvolvimento de Aplicações WEB
	Prof. José Buiar
	
	Framework Exemplo com modelo MVC - Model View Controller

	View para Produto
	
	Os dados são apresentados como uma Table HTML
	Para maiores detalhes vide https://www.w3schools.com/html/html_tables.asp
	
	1.0 - 20ago20 - Versão Inicial
*/
$limite=12;  // linhas por página
?>
<div class='container text-center'>
<div class='row'>
<div class='col-12'>
<h4>Selecione no nome para exibir detalhes</h4>
<table class='table table-striped'>
	<tr>
		<th>Nome</th>
		<th>Código</th>
	</tr>
<?php
$contador=0;
$pagina = isset($_REQUEST['pg']) ? $_REQUEST['pg'] : 1;
$inicio=($pagina-1)*$limite;
$final=($pagina)*$limite;
foreach ($dados as $valor) { 
	++$contador; 
	if ($contador <= $inicio) continue;
	$url="?ctl=".$controller."&mtd=buscar&id=".$valor['id'];
?>	
<tr>
<td><a href='<?php print $url?>'><?php print $valor['nome']; ?></a></td>
<td><a href='<?php print $url?>'><?php print $valor['codigo']; ?></a></td>
</tr>	

<?php	
	if ( $contador >= ($final) ) break;
}
$anterior = $pagina<2 ? ' disabled' : null;
$proxima  = $pagina*$limite > sizeof($dados) ? ' disabled' : null;
?>
</table>
<a class='btn btn-secondary' href=?>Voltar</a>
<a class='btn btn-primary' href='?ctl=<?php print $controller; ?>&mtd=adicionar'>Inserir</a>
<a class='btn btn-warning<?php print $anterior;?>' href='?ctl=<?php print $controller; ?>&mtd=listar&pg=<?php print $pagina-1;?>'>Anterior</a>
<a class='btn btn-white'>Página <?php print $pagina;?></a>
<a class='btn btn-warning<?php print $proxima;?>' href='?ctl=<?php print $controller; ?>&mtd=listar&pg=<?php print $pagina+1;?>'>Próxima</a>
</div>
</div>
</div>