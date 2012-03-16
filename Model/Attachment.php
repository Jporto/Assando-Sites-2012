<?php

App::uses('AppModel', 'Model');

/**
 * Attachment Model
 *
 * @property Lessons $Lessons
 * @property Status $Status
 */
class Attachment extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'lessons_id' => array(
			'numeric' => array(
				'rule' => array('numeric')
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty')
			),
		),
		'file' => array(
			'notempty' => array(
				'rule' => array('notempty')
			),
		),
		'status_id' => array(
			'numeric' => array(
				'rule' => array('numeric')
			),
		),
		'downloads' => array(
			'numeric' => array(
				'rule' => array('numeric')
			),
		),
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array('Lessons', 'Status');
}
