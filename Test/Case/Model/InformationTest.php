<?php
App::uses('Information', 'Model');

/**
 * Information Test Case
 *
 */
class InformationTestCase extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.information', 'app.user', 'app.group', 'app.status', 'app.address', 'app.highrise_person', 'app.enrollment', 'app.course', 'app.lesson', 'app.payment');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Information = ClassRegistry::init('Information');
	}

/**
 * Herdou de model?
 *
 * @return void
 */
	public function testModelObject() {
		$expected = 'Model';
		$result = $this->Information;

		$this->assertInstanceOf($expected, $result, 'Objeto não extendeu Model');
	}

/**
 * Testa registros com informações inválidas
 * 
 * @return void
 */
	public function testInvalidCPFInput() {
		$this->Information->create();
		$this->assertFalse($this->Information->save(array(
			'user_id' => 1,
			'cpf' => '111.111.111-11',
		)), 'Foi possível criar um registro com CPF inválido');

		$this->Information->create();
		$this->assertFalse($this->Information->save(array(
			'user_id' => 2,
			'cpf' => 'Alguma coisa',
		)), 'Foi possível criar um registro com CPF inválido');
	}

/**
 * Testa registros com informações válidas
 * 
 * @return void
 */
	public function testValidCPFInput() {
		$this->Information->create();
		$this->assertInternalType('array', $this->Information->save(array(
			'user_id' => 1,
			'cpf' => '176.648.614-20',
		)), 'Não foi possível criar um registro com CPF válido');

		$this->Information->create();
		$this->assertInternalType('array', $this->Information->save(array(
			'user_id' => 2,
			'cpf' => '734.468.984-76',
		)), 'Não foi possível criar um registro com CPF válido');
	}

/**
 * Testa registros com informações inválidas
 * 
 * @return void
 */
	public function testInvalidMobileInput() {
		$this->Information->create();
		$this->assertFalse($this->Information->save(array(
			'user_id' => 3,
			'mobile' => 'Não tenho',
		)), 'Foi possível criar um registro com telefone inválido');

		$this->Information->create();
		$this->assertFalse($this->Information->save(array(
			'user_id' => 4,
			'mobile' => '8888888',
		)), 'Foi possível criar um registro com telefone inválido');
	}

/**
 * Testa registros com informações válidas
 * 
 * @return void
 */
	public function testValidMobileInput() {
		$this->Information->create();
		$this->assertInternalType('array', $this->Information->save(array(
			'user_id' => 3,
			'mobile' => '(21) 8855-9988',
		)), 'Não foi possível criar um registro com telefone válido');

		$this->Information->create();
		$this->assertInternalType('array', $this->Information->save(array(
			'user_id' => 4,
			'mobile' => '(21) 3344-4455',
		)), 'Não foi possível criar um registro com telefone válido');

		$this->Information->create();
		$this->assertInternalType('array', $this->Information->save(array(
			'user_id' => 5,
			'mobile' => '21 33444455',
		)), 'Não foi possível criar um registro com telefone válido');
	}

/**
 * Testa registros com informações inválidas
 * 
 * @return void
 */
	public function testInvalidTwitterInput() {
		$this->Information->create();
		$this->assertFalse($this->Information->save(array(
			'user_id' => 3,
			'twitter' => 'Não tenho',
		)), 'Foi possível criar um registro com twitter inválido');

		$this->Information->create();
		$this->assertFalse($this->Information->save(array(
			'user_id' => 4,
			'twitter' => 'OláMundo!',
		)), 'Foi possível criar um registro com twitter inválido');
	}

/**
 * Testa registros com informações válidas
 * 
 * @return void
 */
	public function testValidTwitterInput() {
		$this->Information->create();
		$this->assertInternalType('array', $this->Information->save(array(
			'user_id' => 5,
			'twitter' => '@TiuTalk',
		)), 'Não foi possível criar um registro com twitter válido');

		$this->Information->create();
		$this->assertInternalType('array', $this->Information->save(array(
			'user_id' => 6,
			'twitter' => '_',
		)), 'Não foi possível criar um registro com twitter válido');
	}

/**
 * Testa registros com informações válidas mas inexistentes
 * 
 * @return void
 */
	public function testInexistentTwitterAccounts() {
		$this->Information->create();
		$this->assertFalse($this->Information->save(array(
			'user_id' => 3,
			'twitter' => 'P9eCLuAA9k',
		)), 'Foi possível criar um registro com um twitter inexistente');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Information);

		parent::tearDown();
	}

}
