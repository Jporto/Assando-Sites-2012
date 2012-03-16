<?php

App::uses('AppModel', 'Model');

/**
 * Enrollment Model
 *
 * @property User $User
 * @property Course $Course
 * @property Status $Status
 * @property Payment $Payment
 */
class Enrollment extends AppModel {

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
		'course_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
	public $belongsTo = array('User', 'Course', 'Status');

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Payment' => array('dependent' => true)
	);

}
