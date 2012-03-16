<?php

App::uses('AppModel', 'Model');

/**
 * PaymentGateway Model
 *
 * @property Payment $Payment
 */
class PaymentGateway extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array('Payment');

}
