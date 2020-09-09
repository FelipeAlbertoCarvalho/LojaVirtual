<?php
/*	UTFPR/CT/DAINF - Disciplina CSM41-Desenvolvimento de Aplicações WEB
	Prof. José Buiar
	
	Framework Exemplo com modelo MVC - Model View Controller

	View para inserir Cliente novo ou realizar edição
	
	Os dados são apresentados como uma Table HTML
	Para maiores detalhes vide https://www.w3schools.com/html/html_tables.asp
	
	1.0 - 18ago20 - Versão Inicial
*/
$titulo 	= $id 	? 'Editar' 				: 'Inserir';
$metodo 	= $id 	? 'atualizar'			: 'Salvar';
$nome 		= isset($dados['nome'])			? $dados['nome'] : null;
$cpf 		= isset($dados['cpf']) 			? $dados['cpf'] : null;
$telefone 	= isset($dados['telefone']) 	? $dados['telefone'] : null;
$email 		= isset($dados['email']) 		? $dados['email'] : null;
?>

<form action='?ctl=<?php print $controller; ?>&mtd=<?php print $metodo; ?>' 
method='post' onsubmit="validar()">
<div class='container text-center'>
<div class='row'>
<div class='col-12'>
<h4><?php print $titulo; ?><small> registro <?php print $id; ?></small></h4>
<table class='table table-striped'>
<tr>
<th class='text-right'>Nome</th>
<td><input class='form-control' type='text' name='nome' placeholder="xxxxx xxxxx" 
value='<?php print $nome; ?>'></td>
</tr>
<tr>
<th class='text-right'>CPF</th>
<td><input id='cpf'  class='form-control' type='text' name='cpf' 
pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" \
	 placeholder="xxx.xxx.xxx-xx" onLoad='mascCpf(this)' 
	 onKeyDown='mascCpf(this)'	title="Digite um CPF no formato: xxx.xxx.xxx-xx" 
	 value='<?php 
if (isset($cpf)) {
	$cpf=preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4",
		$cpf);
	print $cpf; 
}?>'></td>
</tr>
<tr>
<th class='text-right'>Telefone</th>
<td><input id='telefone' class='form-control' type='text' name='telefone' 
placeholder="(xx)xxxx-xxxx" onLoad='mascFone(this)' onKeyDown='mascFone(this)' 
value='<?php 
if (isset($telefone)) {
	$telefone=preg_replace("/\D/","",$telefone);
	$telefone=preg_replace("/(\d{2})(\d+)(\d{4})$/", "($1)$2-$3", $telefone);
	print $telefone; 
}
?>'></td>
</tr>
<tr>
<th class='text-right'>email</th><td><input  class='form-control' 
type='email' name='email' placeholder="xxxxx@xxxxx.xxx" 
value='<?php print $email; ?>'></td>
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
<script>
function mascCpf(obj) {
	cpf=obj.value;
	cpf=cpf.replace(/\D/g,"")
	cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
	cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
	cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
	obj.value=cpf
}
function mascFone(obj) {
	fone=obj.value;
	fone=fone.replace(/\D/g,"")
	fone=fone.replace(/(\d{2})(\d)/,"($1)$2")
	fone=fone.replace(/(\d{4})(\d{4})$/,"$1-$2")
	fone=fone.replace(/(\d{4})(\d{5})$/,"$1-$2")
	obj.value=fone
}
function validar() {
	ob=document.getElementById('cpf');
	ob.value=ob.value.replace(/\D/g,"")
	ob=document.getElementById('telefone');
	ob.value=ob.value.replace(/\D/g,"")	
}
</script>


