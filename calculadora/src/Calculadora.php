<?php

	global $DIR_BASE;
	require_once $DIR_BASE . 'src/Dinero.php';

	class Calculadora {
		// tiene que poder operar con Dinero - diferentes monedas (?)

		public function sumar($x, $y) {
			return new Dinero($x->enPesos17()->sumarMismaMoneda($y->enPesos17()));
		}

		public function restar($x, $y) {
			//$this->setFueUtilizada();
			return new Dinero(0);
		}
		
	}

?>