<?php
App::uses('PaymentGateway', 'Model');

/**
 * PaymentGateway Test Case
 *
 */
class PaymentGatewayTestCase extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.payment_gateway', 'app.payment');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PaymentGateway = ClassRegistry::init('PaymentGateway');
	}

/**
 * Herdou de model?
 *
 * @return void
 */
	public function testModelObject() {
		$expected = 'Model';
		$result = $this->PaymentGateway;

		$this->assertInstanceOf($expected, $result, 'Objeto não extendeu Model');
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
