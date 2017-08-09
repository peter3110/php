<?php
	global $DIR_BASE;
	
	require_once $DIR_BASE . 'src/Dinero.php';
	require_once $DIR_BASE . 'src/Calculadora.php';

	class CuentaBancaria {
		protected $saldo;
		protected $calculadora;

		public function __construct($calculadora = null, $saldo = null) {
			if($saldo === null) {
				$this->saldo = new Dinero();
			} else {
				$this->saldo = $saldo;
			}
			if($calculadora === null) {
				$this->calculadora = new Calculadora();
			} else {
				$this->calculadora = $calculadora;
			}
		}

		public function getCalculadora() {
			return $this->calculadora;
		}

		public function getSaldo() {
			return $this->saldo;
		}

		public function getSaldoEnPesos17() {
			return $this->saldo->enPesos17()->getCantidad();
		}

		public function depositar($cantidadDeDinero) {
			$this->saldo = $this->calculadora->sumar($this->saldo, $cantidadDeDinero);
			return $this;
		}

		public function extraer($cantidadDeDinero) {
			$resultado = $this->calculadora->restar($this->saldo, $cantidadDeDinero);
			if($resultado->getCantidad() >= 0) {
				$this->saldo = $resultado;
				return $this;
			} else {
				throw new Exception('No puede extraer tanto dinero'); // falta override para que muestre la cantidad de dinero
			}
		}
	}
?>