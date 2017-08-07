<?php 

	/*class Escuela { 
		// usa EscuelaRepositorio
		private $id;
		private $nombre;
		private $direccion;

		public function __construct($data = null) {
			$this->id = $data['id'];
			$this->nombre = $data['nombre'];
			$this->direccion = $data['direccion'];

			$this->repo = new EscuelaRepositorio($conn); 
			// DE DONDE SACO LA CONN ???
		}
		public function cambiarDireccion($nuevaDireccion) {}
	}

	class EscuelaRepositorio {
		private $conn;
		public function __construct(PDO $connection = null) {}
		public function find($id) {}
		public function findAll() {}
		public function save(\Escuela $escuela) {}
		public function update(\Escuela $escuela) {}
	}

	class EscuelaManager {
		// hace todos las acciones y los cambios pertinentes a la escuela
		public function __construct(Escuela $escuela) {
			this->escuela = $escuela;
		}

	}
	*/
	require_once 'digital_version.php';
	require_once 'ConexionRepositorio.php';

	try {
		$conn = new ConexionRepositorio();

		// QUERY2y3
		/*$test_digital_version_item = new digital_version(array('escuela' => '0029JI0901', 'version' => 0, 
			'fecha' => 'fecha_default', 'operador' => 0, "ciclo_lectivo" => 0));
		$test_digital_version_item_escuela = $test_digital_version_item->getEscuela();

		$sql2 = "SELECT * FROM pof_digital_version WHERE escuela = '$test_digital_version_item_escuela';";
		$query2 = $conn->find($sql2); // devuelve un objeto PDOStatement
		$query3 = $conn->find($sql2);

		if($query2) {
			$result2 = $query2->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "digital_version"); 
			$result3 = $query3->fetchAll(PDO::FETCH_ASSOC);
			$i = 0;
			foreach($result2 as $item) {
				echo "Clase de 'item $i' := " . get_class($item) . "<br>";
				echo $item->profile(); // NOTAR QUE ITEM ES DE CLASE digital_version
				$i++;
			}
			echo "size: " . sizeof($result3);
			foreach($result3 as $row) {
				echo $row['escuela'] . " => " . $row['version'] . "<br>";
			}
		}*/
	} catch (PDOException $ex) {
		echo "Error";
	}

?>