<?php
	use PHPUnit\Framework\TestCase;
	require_once 'pof_digital_version.php';

	// Testea la clase que maneja la conexion con la bdd
	class pof_digital_version_conexionRepositorioTest extends TestCase {

		protected $dv_conn;

		public function testCreacionDeInstancia() {
			$this->dv_conn = new pof_digital_version_conexionRepositorio();
			$this->assertEquals(get_class($this->dv_conn), 'pof_digital_version_conexionRepositorio');
		}

	}
	
?>