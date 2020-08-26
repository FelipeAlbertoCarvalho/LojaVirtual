<?php
/*	UTFPR/CT/DAINF - Disciplina CSM41-Desenvolvimento de Aplicações WEB
	Prof. José Buiar
	
	Framework Exemplo com modelo MVC - Model View Controller

	Controlador 1 - Exemplo de Utilização 
	
	1.0 - 05ago20 - Versão Inicial
*/
class Controller1 extends ControllerBase {
// Método para exemplificar o uso
	public function Primeiro() {
		print "Olá, eu sou o método 'Primeiro'".
			" da classe 'Controller1'<BR>ALTERADO!!!!";
		$this->botaoVoltar();
	}
// Método para exemplificar o uso
	public function Segundo() {
		print "Olá, eu sou o método ".
		" <FONT COLOR='red'>'Segundo'".
		" </FONT> da classe 'Controller2'<BR>";
		$this->botaoVoltar();
	}

}

