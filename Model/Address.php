<?php

App::uses('AppModel', 'Model');

/**
 * Address Model
 *
 * @property User $User
 */
class Address extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric')
			),
		),
		'city' => array(
			'notempty' => array(
				'rule' => array('notempty')
			),
		),
		'state' => array(
			'notempty' => array(
				'rule' => array('notempty')
			),
		),
		'country' => array(
			'notempty' => array(
				'rule' => array('notempty')
			),
		),
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array('User');
}
