<?php
/**
 * PaymentFixture
 *
 */
class PaymentFixture extends CakeTestFixture {

/**
 * Import
 *
 * @var array
 */
	public $import = array('model' => 'Payment');

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'user_id' => 1,
			'payment_gateway_id' => 1,
			'enrollment_id' => 1,
			'value' => 1,
			'reference' => 'Lorem ipsum dolor sit amet',
			'status_id' => 1,
			'created' => '2012-03-15 20:44:43',
			'modified' => '2012-03-15 20:44:43'
		),
	);
}
