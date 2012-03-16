<?php

App::uses('AppModel', 'Model');

/**
 * Status Model
 *
 * @property Attachment $Attachment
 * @property Course $Course
 * @property Enrollment $Enrollment
 * @property Group $Group
 * @property Lesson $Lesson
 * @property Payment $Payment
 * @property User $User
 */
class Status extends AppModel {

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

}
