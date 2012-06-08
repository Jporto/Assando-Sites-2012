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
