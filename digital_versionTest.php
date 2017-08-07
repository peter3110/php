<?php
	use PHPUnit\Framework\TestCase;
	require_once 'digital_version.php';

	// Testea la clase que maneja la conexion con la bdd
	class digital_version_conexionRepositorioTest extends TestCase {

		protected $dv_conn;

		public function testCreacionDeInstancia() {
			$this->dv_conn = new digital_version_conexionRepositorio();
			$this->assertEquals(get_class($this->conn), 'digital_version_conexionRepositorio');
		}
		
	}
	
	// Testea la Clase
	class digital_versionTest extends TestCase {

		protected $item;

		protected function setup() {
			$this->item = new digital_version(array('escuela' => '0029JI0901', 'version' => 0, 
			'fecha' => 'fecha_default', 'operador' => 0, "ciclo_lectivo" => 0));
		}

		public function testGetEscuela() {
			$escuela = $this->item->getEscuela();
			$this->assertEquals($escuela,'0029JI0901');
			return $this;
		}

		public function testProfile() {
			$ret = $this->item->profile();
			$this->assertEquals($ret, 
				'Escuela: 0029JI0901 | Version: 0 | Fecha: fecha_default | Operador: 0 | Ciclo lectivo: 0 <br>');
			return $this;
		}
	}
?>