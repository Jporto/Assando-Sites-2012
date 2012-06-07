<?php

App::uses('AppModel', 'Model');

/**
 * PaymentGateway Model
 *
 * @property Payment $Payment
 */
class PaymentGateway extends AppModel {

/**
 * Array Datasource
 * 
 * @var string
 */
	public $useDbConfig = 'arrayDatasource';

/**
 * Status records
 * 
 * @var array
 */
	public $records = array(
		array('id' => 1, 'name' => 'PagSeguro'),
		array('id' => 2, 'name' => 'PayPal'),
	);

	const PAGSEGURO = 1;

	const PAYPAL = 2;

}