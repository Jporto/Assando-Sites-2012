<?php

App::uses('AppModel', 'Model');

/**
 * Lesson Model
 *
 * @property Course $Course
 * @property Status $Status
 */
class Lesson extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'course_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'subject' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'length' => array(
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
	public $belongsTo = array('Course', 'Status');

}
