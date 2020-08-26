<?php
/*	UTFPR/CT/DAINF - Disciplina CSM41-Desenvolvimento de Aplicações WEB
	Prof. José Buiar
	
	Framework Exemplo com modelo MVC - Model View Controller

	Página de Entrada
	
	1.0 - 05ago20 - Versão Inicial
	1.1 - 05ago20 - Demonstração do Model
*/?>
<h2>Página de Entrada</h2>

Esta página será mostrada quando não forem fornecidos parametros adequados na URL de entrada.

<br/>
Aqui pode ser montada a página de entrada do site. 
<br/>
Inicialmente temos uma página HTML simples, mas depois pode ser colocado um script.
<br/>
<br/>
Para os testes iniciais selecione:
<ul>
<li><a href='?ctl=Controller1&mtd=listar'>Obtendo todos dados com Model 1</a></li>
<li><a href='?ctl=Controller1&mtd=buscar&id=3'>Obtendo um dado específico (id=3) com Model 1</a></li>
<li><a href='?ctl=Controller2&mtd=listar'>Obtendo todos dados com Model CSV</a></li>
<li><a href='?ctl=Controller2&mtd=buscar&id=12'>Obtendo um dado específico (id=12) com Model CSV</a></li>
</ul>

