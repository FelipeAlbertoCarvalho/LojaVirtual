<?php
/*	UTFPR/CT/DAINF - Disciplina CSM41-Desenvolvimento de Aplicações WEB
	Prof. José Buiar
	
	Framework Exemplo com modelo MVC - Model View Controller

	Controlador 2 - Exemplo de Utilização 
	
	1.0 - 05ago20 - Versão Inicial
*/
class Controller2 extends ControllerBase {
// Método para exemplificar o uso	
	public function Primeiro() {
		print "<B>Controller 2</B><BR />";
		print "Olá, eu sou o método 'Primeiro' da classe 'Controller2'<BR>";
		$this->botaoVoltar();
	}
}