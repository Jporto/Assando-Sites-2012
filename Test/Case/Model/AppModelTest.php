<?php

App::uses('AppModel', 'Model');

/**
 * AppModel Test Case
 */
class AppModelTestCase extends CakeTestCase {

	/**
	 * Inicializa os testes
	 */
	public function setUp() {
		parent::setUp();
		$this->AppModel = ClassRegistry::init('AppModel');
	}

	/**
	 * Testa o objeto de AppModel
	 */
	public function testAppModelObject() {
		$result = $this->AppModel;
		$expected = 'Model';

		$this->assertInstanceOf($expected, $result, 'AppModel não é uma instância de Model');
	}

	/**
	 * Finaliza os testes
	 */
	public function tearDown() {
		unset($this->AppModel);

		parent::tearDown();
	}

}
