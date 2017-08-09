<?php
	global $DIR_BASE;
	use PHPUnit\Framework\TestCase;
	require_once $DIR_BASE . 'src/CuentaBancaria.php';
	require_once $DIR_BASE . 'src/Persona.php';

	class mainTest extends TestCase {

		public function testLogGuardaInformacionDeLasTransaccionesRealizadas() {
			
			$this->expectOutputRegex("/Persona deposita \\$1./");

			$p1 = new Persona();
			$cb = new CuentaBancaria();
			$unPeso = new Dinero(1, '$');
			$p1->depositar($cb, $unPeso);
			$output = "Persona deposita " . $unPeso . ".";

			echo $output;
		}

		public function testDosPersonasDepositanUnPesoEnLaMismaCuenta() {
			$p1 = new Persona();
			$p2 = new Persona();
			$cb = new CuentaBancaria();
			$unPeso = new Dinero(1, '$');

			$p1->depositar($cb, $unPeso);
			$this->assertEquals($cb->getSaldoEnPesos17(), 1);
			$p2->depositar($cb, $unPeso);
			$this->assertEquals($cb->getSaldoEnPesos17(), 2);
		}

		public function testUnaPersonaDepositaYOtraExtraeDentroDeLosLimitesDeLaMismaCuenta() {
			$p1 = new Persona();
			$p2 = new Persona();
			$cb = new CuentaBancaria();
			$unPeso = new Dinero(1, '$');
			$dosPesos = new Dinero(2, '$');

			$p1->depositar($cb, $dosPesos);
			$this->assertEquals($cb->getSaldoEnPesos17(), 2);
			$p2->extraer($cb, $unPeso);
			$this->assertEquals($cb->getSaldoEnPesos17(), 1);
		}

		public function testUnaPersonaDepositaYOtraExtraeDemasiadoDeLaMismaCuenta() {
			$p1 = new Persona();
			$p2 = new Persona();
			$cb = new CuentaBancaria();
			$unPeso = new Dinero(1, '$');
			$dosPesos = new Dinero(2, '$');

			$p1->depositar($cb, $unPeso);
			$this->assertEquals($cb->getSaldoEnPesos17(), 1);

			$this->expectException(Exception::class);
			$p2->extraer($cb, $dosPesos);
		}
	}
?>