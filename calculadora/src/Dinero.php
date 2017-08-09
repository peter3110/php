<?php

	class Dinero {
		private $cantidad;
		private $moneda;

		public function __construct($cantidad = 0, $moneda = 'USD$') {
			$this->cantidad = $cantidad;
			$this->moneda = $moneda; // ['$', 'USD$']
		}

		public function __toString() {
			return $this->moneda . ((string) $this->cantidad);
		}

		public function getCantidad() {
			return $this->cantidad;
		}

		public function getMoneda() {
			return $this->moneda;
		}

		public function getCantidadEnPesos17() {
			if($this->moneda == '$') { return $this->cantidad; }
			if($this->moneda == 'USD$') { 
				return 17 * $this->cantidad; 
			} else {
				throw new Exception('error: la moneda solo puede ser $ o USD$');
			}

		}
	}
?>