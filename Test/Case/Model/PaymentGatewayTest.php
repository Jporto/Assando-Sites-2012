<?php
App::uses('PaymentGateway', 'Model');
App::uses('Status', 'Model');

/**
 * PaymentGateway Test Case
 *
 */
class PaymentGatewayTestCase extends CakeTestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PaymentGateway = ClassRegistry::init('PaymentGateway');
		$this->PaymentGateway->useDbConfig = 'arrayDatasource';
	}

/**
 * Herdou de model?
 *
 * @return void
 */
	public function testModelObject() {
		$this->assertInstanceOf('Model', $this->PaymentGateway, 'Objeto não extendeu Model');
	}

/**
 * Testa o datasource
 *
 * @return void
 */
	public function testDatabaseConfig() {
		$this->assertEquals('arrayDatasource', $this->PaymentGateway->useDbConfig, 'PaymentGateway não usa o arrayDatasource');
	}

/**
 * Testa os gateways
 *
 * @return void
 */
	public function testPaymentGateways() {
		$this->assertCount(2, $this->PaymentGateway->find('all'));

		$Gateway = $this->PaymentGateway->read(null, PaymentGateway::PAGSEGURO);
		$this->assertEquals('PagSeguro', $Gateway['PaymentGateway']['name']);

		$Gateway = $this->PaymentGateway->read(null, PaymentGateway::PAYPAL);
		$this->assertEquals('PayPal', $Gateway['PaymentGateway']['name']);
	}

/**
 * Testa a conversão de status do PagSeguro
 *
 * @return void
 */
	public function testPagSeguroStatus() {
		$this->assertEquals(Status::PAGAMENTO_INICIADO,		$this->PaymentGateway->pagSeguroStatus(0));
		$this->assertEquals(Status::PAGAMENTO_PENDENTE,		$this->PaymentGateway->pagSeguroStatus(1));
		$this->assertEquals(Status::PAGAMENTO_EM_ANALISE,	$this->PaymentGateway->pagSeguroStatus(2));
		$this->assertEquals(Status::PAGAMENTO_CONFIRMADO,	$this->PaymentGateway->pagSeguroStatus(3));
		$this->assertEquals(Status::PAGAMENTO_DISPONIVEL,	$this->PaymentGateway->pagSeguroStatus(4));
		$this->assertEquals(Status::PAGAMENTO_EM_DISPUTA,	$this->PaymentGateway->pagSeguroStatus(5));
		$this->assertEquals(Status::PAGAMENTO_RESSARCIDO,	$this->PaymentGateway->pagSeguroStatus(6));
		$this->assertEquals(Status::PAGAMENTO_CANCELADO,	$this->PaymentGateway->pagSeguroStatus(7));

		// Status inválido
		$this->assertFalse($this->PaymentGateway->pagSeguroStatus(-1));
		$this->assertFalse($this->PaymentGateway->pagSeguroStatus(10));
	}

/**
 * Testa a conversão de status do PayPal
 *
 * @return void
 */
	public function testPayPalStatus() {
		$this->assertEquals(Status::PAGAMENTO_INICIADO,		$this->PaymentGateway->payPalStatus('Created'));
		$this->assertEquals(Status::PAGAMENTO_EM_ANALISE,	$this->PaymentGateway->payPalStatus('Pending'));
		$this->assertEquals(Status::PAGAMENTO_CONFIRMADO,	$this->PaymentGateway->payPalStatus('Processed'));
		$this->assertEquals(Status::PAGAMENTO_DISPONIVEL,	$this->PaymentGateway->payPalStatus('Completed'));

		$this->assertEquals(Status::PAGAMENTO_RESSARCIDO,	$this->PaymentGateway->payPalStatus('Reversed'));
		$this->assertEquals(Status::PAGAMENTO_RESSARCIDO,	$this->PaymentGateway->payPalStatus('Refunded'));

		$this->assertEquals(Status::PAGAMENTO_CANCELADO,	$this->PaymentGateway->payPalStatus('Denied'));
		$this->assertEquals(Status::PAGAMENTO_CANCELADO,	$this->PaymentGateway->payPalStatus('Expired'));
		$this->assertEquals(Status::PAGAMENTO_CANCELADO,	$this->PaymentGateway->payPalStatus('Failed'));
		$this->assertEquals(Status::PAGAMENTO_CANCELADO,	$this->PaymentGateway->payPalStatus('Voided'));
		$this->assertEquals(Status::PAGAMENTO_CANCELADO,	$this->PaymentGateway->payPalStatus('Canceled_Reversal'));

		// Status inválido
		$this->assertFalse($this->PaymentGateway->payPalStatus('Unpaid'));
		$this->assertFalse($this->PaymentGateway->payPalStatus(1));
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PaymentGateway);

		parent::tearDown();
	}

}
