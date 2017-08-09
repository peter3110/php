Para correr:
	. phpunit --bootstrap config.php {., tests, tests/testsUnidad/testsProviders, etc.}
	. phpunit --configuration testing.xml --testsuite {todo, providers, etc.}

	. --testdox => visualizar tests de la forma:
		CuentaBancariaTestDeUnidad
 			[x] Inicializacion cuenta bancaria con dos pesos
 	.