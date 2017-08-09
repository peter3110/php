<?php
	global $DIR_BASE;
	use PHPUnit\Framework\TestCase;
	require_once $DIR_BASE . "src/Parser.php";

	class testParser extends TestCase {

		public function test01() {
			global $DIR_BASE;

			$parser = new Parser($DIR_BASE . "data/input.txt");
			$result = $parser->parseRows();

			$this->assertInternalType('array', $result);
			$this->assertEquals(get_class($result[0]), 'Bienvenida');
			$this->assertEquals(get_class($result[1]), 'Despedida');
		}
	}

?>