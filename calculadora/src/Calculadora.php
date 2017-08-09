<?php

	global $DIR_BASE;
	require_once $DIR_BASE . 'src/Dinero.php';

	class Calculadora {
		// tiene que poder operar con Dinero - diferentes monedas (?)

		public function sumarAPesos($x, $y) {
			// asume que son pesos
			return new Dinero($x->getCantidadEnPesos17() + $y->getCantidadEnPesos17(), '$');
		}

		public function restarAPesos($x, $y) {
			//$this->setFueUtilizada();
			return new Dinero($x->getCantidadEnPesos17() - $y->getCantidadEnPesos17(), '$');
		}
		
	}

?>