<?php

App::uses('AppModel', 'Model');

/**
 * AppModel Test Case
 */
class AppModelTestCase extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.user', 'app.group', 'app.status', 'app.address', 'app.highrise_person', 'app.information', 'app.enrollment', 'app.course', 'app.lesson', 'app.payment', 'app.payment_gateway');

/**
 * Inicializa os testes
 * 
 * @return  void
 */
	public function setUp() {
		parent::setUp();

		$this->AppModel = ClassRegistry::init('AppModel');
		$this->User = ClassRegistry::init('User');
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
 * Testa o containable behavior
 * 
 * @return  void
 */
	public function testContainableBehavior() {
		$result = $this->AppModel->actsAs;
		$expected = 'Containable';

		$this->assertInternalType('array', $result, 'AppModel não tem behaviors');
		$this->assertContains($expected, $result, 'AppModel não tem o Containable behavior');
	}

/**
 * Testa o User::find('active')
 * 
 * @covers AppModel::_findActive
 * 
 * @return void
 */
	public function testFindActive() {
		$result = $this->User->find('active');
		$expected = 'array';

		$this->assertInternalType($expected, $result, "O resultado de AppModel::find('active') não é um array");
		$this->assertCount(2, $result, "O resultado de AppModel::find('active') não encontrou apenas dois usuários ativos");
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
