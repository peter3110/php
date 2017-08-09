<?php
	//global $DIR_BASE;
	//require_once $DIR_BASE . 'src/CuentaBancaria.php';
	//require_once $DIR_BASE . 'src/Calculadora.php';
	//require_once $DIR_BASE . 'src/Dinero.php';

	class Persona {
		
		public function depositar($cb, $cantidadDeDinero) {
			$cb->depositar($cantidadDeDinero);
		}

		public function extraer($cb, $cantidadDeDinero) {
			$cb->extraer($cantidadDeDinero);
		}

	}

?>