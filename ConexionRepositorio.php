<?php
	class ConexionRepositorio {

		// por default se conecta al repositorio de Aristas
		private $dbkind = 'mysql';
		private $host = 'localhost';
		private $dbname = 'db1';
		private $dbuser = 'root';
		private $pass = 'aristas1234';

		protected $connection;

		public function __construct(PDO $connection = null) {
			$this->connection = $connection;
			if($this->connection === null) {
				$this->connection = new PDO(sprintf("%s:host=%s;dbname=%s", $this->dbkind, $this->host, $this->dbname), $this->dbuser, $this->pass);
			}
		}

		public function find($sql) {
			return $this->connection->query($sql);
		}

	}
	
?>