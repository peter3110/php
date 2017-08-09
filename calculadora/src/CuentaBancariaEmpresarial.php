<?php
	global $DIR_BASE;
	
	require $DIR_BASE . 'src/CuentaBancaria.php';

	class CuentaBancariaEmpresarial extends CuentaBancaria {

		public function __construct() {
			parent::__construct();
		}

	}
?>