<?php
	require_once 'ConexionRepositorio.php';

	// La clase que maneja la relacion con la bdd
	class digital_version_conexionRepositorio extends ConexionRepositorio {
		
		public function __construct(PDO $connection = null) {
			parent::__construct($connection);
		}

		public function save() {

		}

		public function update() {

		}

		public function remove() {

		}
	}

	// La clase para los objetos que vamos a guardar en la tabla digital_version
	class digital_version {
		private $escuela;
		private $version;
		private $fecha;
		private $operador;
		private $ciclo_lectivo;

		public function __construct($data = array('escuela' => 'default', 'version' => 0, 
				'fecha' => 'default', 'operador' => 0, 'ciclo_lectivo' => 0)) {
			$this->escuela = $data['escuela'];
			$this->version = $data['version'];
			$this->fecha = $data['fecha'];
			$this->operador = $data['operador'];
			$this->ciclo_lectivo = $data['ciclo_lectivo'];
		}

		public function profile() {
			return sprintf('Escuela: %s | Version: %d | Fecha: %s | Operador: %d | Ciclo lectivo: %d <br>', 
				$this->escuela, $this->version, $this->fecha, $this->operador, $this->ciclo_lectivo);
		}

		public function getEscuela() {
			return $this->escuela;
		}

		public function getVersion() {

		}

		public function getFecha() {

		}

		public function getOperador() {

		}

		public function getCiclo_lectivo() {

		}


	}
?>