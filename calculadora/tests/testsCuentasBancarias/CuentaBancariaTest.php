<?php
	global $DIR_BASE;

	use PHPUnit\Framework\TestCase;
	require_once $DIR_BASE . 'src/Dinero.php';
	require_once $DIR_BASE . 'src/Calculadora.php';
	require_once $DIR_BASE . 'src/CuentaBancaria.php';
	require_once $DIR_BASE . 'src/CsvFileIterator.php';
	
	class CuentaBancariaTest extends TestCase {

		public function testInicializacionCuentaBancariaConDosPesos() {
			$stub_calculadora = $this->createMock(Calculadora::class);

			$cb = new CuentaBancaria($stub_calculadora, new Dinero(2, '$'));
			$this->assertEquals($cb->getSaldo(), new Dinero(2, '$'));
		}

		public function testDepositoDeDosPesosEnNuevaCuentaBancaria() {
			$stub_calculadora = $this->createMock(Calculadora::class);
			$stub_calculadora->expects($this->exactly(1))
				->method('sumar')
				// aca tambien podria usar 'withConsecutive', con un array de condiciones para cada argumento
				// ó, 'callback' si hubiera que realizar verificacion de parametros mas compleja
				->with($this->anything(), $this->equalTo(new Dinero(2,'$')));

			$cb = new CuentaBancaria($stub_calculadora);
			$cb->depositar(new Dinero(2, '$'));
			return $cb;
		}

		public function testDepositoDeDosYCincoPesosYObtenerSaldoEnPesos() {
			$stub_calculadora = $this->createMock(Calculadora::class);
			$stub_calculadora->expects($this->exactly(2))
				->method('sumar')
				->will($this->onConsecutiveCalls(new Dinero(2, 'USD$'), new Dinero(5, 'USD$')));

			// usa la Calculadora para ver cuanto dinero queda tras depositar el dinero
			$cb = new CuentaBancaria($stub_calculadora);

			$this->assertEquals($cb->depositar(new Dinero(2, 'USD$'))->getSaldoEnPesos17(), 2 * 17);
			$this->assertEquals($cb->depositar(new Dinero(3, 'USD$'))->getSaldoEnPesos17(), 5 * 17);
			return $cb;
		}	

		public function testDepositoDeDineroEnPesosYDolaresYObtenerSaldoEnPesos() {
			$stub_calculadora = $this->createMock(Calculadora::class);
			$stub_calculadora->expects($this->exactly(2))
				->method('sumar')
				->will($this->onConsecutiveCalls(new Dinero(2, 'USD$'), new Dinero(5*17, '$')));

			// usa la Calculadora para ver cuanto dinero queda tras depositar el dinero
			$cb = new CuentaBancaria($stub_calculadora); 

			$this->assertEquals($cb->depositar(new Dinero(2, 'USD$'))->getSaldoEnPesos17(), 2 * 17);
			$this->assertEquals($cb->depositar(new Dinero(3 * 17, '$'))->getSaldoEnPesos17(), 5 * 17);

			return $cb;
		}

		public function testExtraccionDeUnPesoEnNuevaCuentaBancariaSinPrevioDeposito() {
			
			$stub_calculadora = $this->createMock(Calculadora::class);
			$stub_calculadora->method('restar')
				->will($this->returnValue(new Dinero(-1, '$')));

			$cb = new CuentaBancaria($stub_calculadora);
			
			$this->expectException(Exception::class);
			$cb->extraer(new Dinero(1, '$'));

			return $cb;
		}
		
		public function testExtraccionDeUnPesoTrasDepositarDosPesos() {
			$stub_calculadora = $this->createMock(Calculadora::class);
			$stub_calculadora->expects($this->exactly(1))
				->method('sumar')
				->will($this->returnValue(new Dinero(2, 'USD$')));
			$stub_calculadora->expects($this->exactly(1))
				->method('restar')
				->will($this->returnValue(new Dinero(1, 'USD$')));
			$cb = new CuentaBancaria($stub_calculadora);

			$cb->depositar(new Dinero(2, 'USD$'));
			$cb->extraer(new Dinero(1, 'USD$'));

			$this->assertEquals($cb->getSaldoEnPesos17(), 17);
		}

		
		// Testing con data providers:
		public static function proveedorUnDepositoUnaExtraccionSaldoEnPesosYDolares() {
			return [
				// lo que devuelve la primera suma y luego la primera resta,y el saldo final en pesos17
				'test1' => [new Dinero(2, 'USD$'), new Dinero(1, 'USD$'), 17],
				'test2' => [new Dinero(2, 'USD$'), new Dinero(34, '$'), 34],
				'test3' => [new Dinero(2, 'USD$'), new Dinero(17, '$'), 17],
				'test4' => [new Dinero(2, 'USD$'), new Dinero(0, '$'), 0]
			];
		}
		
		/**
		* @dataProvider proveedorUnDepositoUnaExtraccionSaldoEnPesosYDolares
		*/
     	public function testExtraccionDeYPesosTrasDepositoDeXPesos($x, $y, $z) {
     		$stub_calculadora = $this->createMock(Calculadora::class);
			$stub_calculadora->expects($this->exactly(1))
				->method('sumar')
				->will($this->returnValue($x));
			$stub_calculadora->expects($this->exactly(1))
				->method('restar')
				->will($this->returnValue($y));
			$cb = new CuentaBancaria($stub_calculadora);

			$cb->depositar($x);
			$cb->extraer($y);

			$this->assertEquals($cb->getSaldoEnPesos17(), $z);
     	}


     	// Testear input/output deseados para depositos y extracciones en pesos
		public static function proveedorUnDepositoUnaExtraccionSaldoEnPesosCSV() {
			return new CsvFileIterator('/Users/pedro/Desktop/Aristas/php-testing/calculadora/data/csvFile.csv');
		}
		/**
		* @dataProvider proveedorUnDepositoUnaExtraccionSaldoEnPesosCSV
		*/
		public function testDepositoYExtraccion($x, $y, $z) {
			$stub_calculadora = $this->createMock(Calculadora::class);
			$stub_calculadora->expects($this->exactly(1))
				->method('sumar')
				->will($this->returnValue(new Dinero($x, '$')));
			$stub_calculadora->expects($this->exactly(1))
				->method('restar')
				->will($this->returnValue(new Dinero($y, '$')));

			$cb = new CuentaBancaria($stub_calculadora);
			$cb->depositar($x);
			$cb->extraer($y);

			$this->assertEquals($cb->getSaldoEnPesos17(), $z);
		}
     	
     	// Testear otra cosa
		
	}
?>







