<?php
App::uses('PaymentGateway', 'Model');

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
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PaymentGateway);

		parent::tearDown();
	}

}
