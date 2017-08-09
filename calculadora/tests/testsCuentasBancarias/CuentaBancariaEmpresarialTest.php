<?php
	global $DIR_BASE;

	use PHPUnit\Framework\TestCase;
	require_once $DIR_BASE . 'src/Calculadora.php';
	require_once $DIR_BASE . 'src/CuentaBancariaEmpresarial.php';

	class CuentaBancariaEmpresarialTest extends TestCase {
		
		public function testInicializarCBEDefault() {

			$cb = new CuentaBancariaEmpresarial();
			$this->assertEquals($cb->getSaldo(), new Dinero(0, 'USD$'));
		}
		
	}
?>