<?php
App::uses('Payment', 'Model');
App::uses('PaymentGateway', 'Model');
App::uses('Status', 'Model');

/**
 * Payment Test Case
 *
 */
class PaymentTestCase extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.payment', 'app.user', 'app.group', 'app.status', 'app.address', 'app.highrise_person', 'app.information', 'app.enrollment', 'app.course', 'app.lesson', 'app.payment_gateway');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Payment = ClassRegistry::init('Payment');
	}

/**
 * Herdou de model?
 *
 * @return void
 */
	public function testModelObject() {
		$this->assertInstanceOf('Model', $this->Payment, 'Objeto não extendeu Model');
	}

/**
 * Valida dados inválidos
 *
 * @return void
 */
	public function testInvalidData() {
		$this->Payment->create();
		$this->assertFalse($this->Payment->save(), 'Foi possível salvar um pagamento sem dados');

		// Sem usuário
		$this->Payment->create();
		$this->assertFalse($this->Payment->save(array(
			'value' => 100,
			'reference' => uniqid(),
			'payment_gateway_id' => PaymentGateway::PAGSEGURO,
		)), 'Foi possível salvar um pagamento sem usuaŕio');
		$this->assertArrayHasKey('user_id', $this->Payment->validationErrors);
		$this->assertContains('Informe o aluno', $this->Payment->validationErrors['user_id']);

		// Sem gateway
		$this->Payment->create();
		$this->assertFalse($this->Payment->save(array(
			'user_id' => 1,
			'value' => 100,
			'reference' => uniqid(),
		)), 'Foi possível salvar um pagamento sem gateway');
		$this->assertArrayHasKey('payment_gateway_id', $this->Payment->validationErrors);
		$this->assertContains('Informe o gateway de pagamento', $this->Payment->validationErrors['payment_gateway_id']);

		// Sem valor
		$this->Payment->create();
		$this->assertFalse($this->Payment->save(array(
			'user_id' => 1,
			'reference' => uniqid(),
			'payment_gateway_id' => PaymentGateway::PAGSEGURO,
		)), 'Foi possível salvar um pagamento sem valor');
		$this->assertArrayHasKey('value', $this->Payment->validationErrors);
		$this->assertContains('Informe o valor', $this->Payment->validationErrors['value']);

		// Sem referência
		$this->Payment->create();
		$this->assertFalse($this->Payment->save(array(
			'user_id' => 1,
			'value' => 100,
			'payment_gateway_id' => PaymentGateway::PAGSEGURO,
		)), 'Foi possível salvar um pagamento sem referência');
		$this->assertArrayHasKey('reference', $this->Payment->validationErrors);
		$this->assertContains('Informe a referência', $this->Payment->validationErrors['reference']);
	}

/**
 * Valida dados válidos
 *
 * @return void
 */
	public function testValidData() {
		$reference = uniqid();

		$this->Payment->create();
		$this->assertInternalType('array', $this->Payment->save(array(
			'user_id' => 1,
			'value' => 100,
			'reference' => $reference,
			'payment_gateway_id' => PaymentGateway::PAGSEGURO,
		)), 'Foi possível salvar um pagamento sem usuaŕio');

		// Busca o pagamento pela referência
		$Payment = $this->Payment->findByReference($reference);
		$this->assertNotEmpty($Payment, 'Não foi possível encontrar um pagamento pela referência');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Payment);

		parent::tearDown();
	}

}
