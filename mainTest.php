<?php
	
	# (para ayuda) ver http://slashnode.com/pdo-for-elegant-php-database-access/
	
	use PHPUnit\Framework\TestCase;
	require_once 'digital_version.php';
	require_once 'ConexionRepositorio.php';
	
	class mainTest extends TestCase {

		public function testConexionDefaultValida() {
			try {
				$conn = new ConexionRepositorio();
				$this->assertEquals(get_class($conn), 'ConexionRepositorio');
			} catch(Exception $ex) {
				$this->fail('La conexion por default no debería tirar error');
			}
		}

		public function testBDD_PRUEBA_POF_DIGITAL_VERSION() {
			try {
				$conn = new ConexionRepositorio();
				$sql1 = 'SELECT * FROM pof_digital_version LIMIT 1';
				
				// Al menos debe devolver un resultado
				$query1 = $conn->find($sql1);
				$this->assertNotNull($query1);

				// Como seteamos el limite en 1, deberia devolver solo un resultado
				$result = $query1->fetchAll(PDO::FETCH_ASSOC);
				$this->assertEquals(sizeof($result), 1);

				// Si estamos usando la bdd de testing, ya sabemos cual debe ser la escuela
				foreach ($result as $row) {
					$this->assertEquals($row["escuela"], "0029JI0901");
				}
			} catch (Exception $ex) {
				$this->fail('Una busqueda en la conexion default, en la tabla pof_digital_version no deberia tirar error');
			}
		}
	}
	
?>