<?php
	global $DIR_BASE;

	use PHPUnit\Framework\TestCase;
	require_once $DIR_BASE . 'src/Dinero.php';
	require_once $DIR_BASE . 'src/Calculadora.php';
	require_once $DIR_BASE . 'src/CuentaBancaria.php';
	require_once $DIR_BASE . 'src/CsvFileIterator.php';
	
	class CuentaBancariaTestDeIntegracion extends TestCase {

		public function testInicializacionCuentaBancariaConDosPesos() {
			$calculadora = new Calculadora();

			$cb = new CuentaBancaria($calculadora, new Dinero(2, '$'));
			$this->assertEquals($cb->getSaldo(), new Dinero(2, '$'));
		}

		public function testDepositoDeDosYTresDolaresYObtenerSaldoEnPesos() {
			$calculadora = new Calculadora();
			// usa la Calculadora para ver cuanto dinero queda tras depositar el dinero
			$cb = new CuentaBancaria($calculadora);

			$this->assertEquals($cb->depositar(new Dinero(2, 'USD$'))->getSaldoEnPesos17(), 2 * 17);
			$this->assertEquals($cb->depositar(new Dinero(3, 'USD$'))->getSaldoEnPesos17(), 5 * 17);
			return $cb;
		}	
	}

?>