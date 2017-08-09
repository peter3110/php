<?php

	class Dinero {
		private $cantidad;
		private $moneda;

		public function __construct($cantidad = 0, $moneda = 'USD$') {
			$this->cantidad = $cantidad;
			$this->moneda = $moneda; // ['$', 'USD$']
		}

		public function __toString() {
			return ((string) $this->cantidad) . $this->moneda;
		}

		public function getCantidad() {
			return $this->cantidad;
		}

		public function getMoneda() {
			return $this->moneda;
		}

		public function enPesos17() {
			if($this->moneda == '$') { return $this; }
			if($this->moneda == 'USD$') { 
				return new Dinero(17 * $this->cantidad, 'USD$'); 
			}
		}

		public function sumarMismaMoneda($otraSumaDeDinero) {
			$this->cantidad = $this->cantidad + getCantidad($otraSumaDeDinero);
			$this->moneda = $this->moneda;
		}

		public function restar($otraSumaDeDinero) {
			$this->cantidad = $this->cantidad - getCantidad($otraSumaDeDinero);
			return $this;
		}
	}
?>