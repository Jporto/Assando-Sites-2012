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
				'message' => 'Informe o aluno',
				'required' => 'create',
			),
		),
		'payment_gateway_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Informe o gateway de pagamento',
				'required' => 'create',
			),
		),
		'value' => array(
			'notempty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Informe o valor',
				'required' => 'create',
			),
			'decimal' => array(
				'rule' => array('decimal', true),
				'message' => 'Informe o valor em forma decimal',
				'required' => 'create',
			),
		),
		'reference' => array(
			'notempty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Informe a referência',
				'required' => 'create',
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
	public $belongsTo = array(
		'User',
		'PaymentGateway',
		'Enrollment',
		'Status' => array(
			'conditions' => array(
				'Status.model' => 'Payment'
			)
		)
	);

}