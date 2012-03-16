<?php

App::uses('AppModel', 'Model');

/**
 * AppModel Test Case
 */
class AppModelTestCase extends CakeTestCase {

/**
 * Inicializa os testes
 * 
 * @return  void
 */
	public function setUp() {
		parent::setUp();
		$this->AppModel = ClassRegistry::init('AppModel');
	}

/**
 * Testa o objeto de AppModel
 * 
 * @return  void
 */
	public function testAppModelObject() {
		$result = $this->AppModel;
		$expected = 'Model';

		$this->assertInstanceOf($expected, $result, 'AppModel não é uma instância de Model');
	}

/**
 * Finaliza os testes
 * 
 * @return  void
 */
	public function tearDown() {
		unset($this->AppModel);

		parent::tearDown();
	}

}