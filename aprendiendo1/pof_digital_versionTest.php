<?php
	use PHPUnit\Framework\TestCase;
	require_once 'pof_digital_version.php';
	
	// Testea la Clase
	class pof_digital_versionTest extends TestCase {

		protected $item;

		protected function setup() {
			$this->item = new pof_digital_version(array('escuela' => '0029JI0901', 'version' => 0, 
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
				'Escuela: 0029JI0901 | Version: 0 | Fecha: fecha_default | Operador: 0 | Ciclo lectivo: 0');
			return $this;
		}
	}
?>