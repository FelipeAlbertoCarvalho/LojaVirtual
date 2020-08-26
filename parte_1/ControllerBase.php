<?php
/*	UTFPR/CT/DAINF - Disciplina CSM41-Desenvolvimento de Aplicações WEB
	Prof. José Buiar
	
	Framework Exemplo com modelo MVC - Model View Controller

	Controlador Base
	
	Os diversos controladores da aplicação serão herdados desta classe de base
	As funcionalidades comuns devem ser agregadas aqui
	
	1.0 - 05ago20 - Versão Inicial
*/
class ControllerBase {
	public function botaoVoltar() {
		print "<A HREF=?>Voltar</A>";	
	}
}