<?php
/**
 * PaymentGatewayFixture
 *
 */
class PaymentGatewayFixture extends CakeTestFixture {

/**
 * Formato dos registros
 * 
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false),
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array('id' => 1, 'name' => 'PagSeguro'),
		array('id' => 2, 'name' => 'Paypal'),
	);
}
