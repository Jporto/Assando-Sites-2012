<?php

App::uses('AppModel', 'Model');

/**
 * Payment Model
 *
 * @property User $User
 * @property PaymentGateway $PaymentGateway
 * @property Enrollment $Enrollment
 * @property Status $Status
 */
class Payment extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'payment_gateway_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'reference' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'status_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array('User', 'PaymentGateway', 'Enrollment', 'Status');

}
