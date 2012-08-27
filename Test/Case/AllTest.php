<?php

/**
 * Executa todos os testes do projeto
 */
class AllTest extends CakeTestSuite {

	public static function suite() {
		$suite = new CakeTestSuite('All APP tests');
		$suite->addTestDirectoryRecursive(TESTS . 'Case');

		return $suite;
	}

}