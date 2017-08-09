<?php
	
	class Bienvenida {

	}

	class Despedida {

	}

	class Parser {

		private $path;

		public function __construct($path) {
			$this->path = $path;
		}

		public function parseRow($row) {
			if(preg_match("/hola/", $row)) return new Bienvenida();
			if(preg_match("/chau/", $row)) return new Despedida();
			return $row;
		}

		public function parseRows() {
			$txt_file    = file_get_contents($this->path);
			$rows        = explode("\n", $txt_file);
			$result = array();

			foreach($rows as $row => $data)
			{
			    array_push($result, $this->parseRow($data));
			}
			return $result;
		}
	}
?>