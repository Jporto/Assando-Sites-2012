<?php

App::uses('AppModel', 'Model');

/**
 * Course Model
 *
 * @property Status $Status
 * @property Enrollment $Enrollment
 * @property Lesson $Lesson
 */
class Course extends AppModel {

/**
 * Behaviors
 * 
 * @var array
 */
	public $actsAs = array(
		'Utils.Sluggable' => array(
			'label' => 'name',
			'slug' => 'slug',
			'separator' => '-',
			'update' => true,
		)
	);

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'code' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'slug' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'description' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'advanced' => array(
			'boolean' => array(
				'rule' => array('boolean'),
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
	public $belongsTo = array('Status');

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Enrollment' => array('dependent' => true),
		'Lesson' => array('dependent' => true)
	);

/**
 * Calcula a data limite de inscrição
 * 
 * @return string
 */
	protected function _calculateEnrollmentLimit($start) {
		$courseStart = new DateTime($start);
		$timeInterval = DateInterval::createFromDateString(Configure::read('Enrollment.limit'));

		$enrollmentLimit = $courseStart->sub($timeInterval);
		$enrollmentLimit->setTime(23, 59, 59);

		return $enrollmentLimit->format(DB_DATETIME_FORMAT);
	}

/**
 * Antes de validar
 * 
 * @return boolean
 */
	public function beforeSave($options = array()) {
		if (!isset($this->data[$this->alias]['enrollment_limit']) && isset($this->data[$this->alias]['start'])) {
			$start = $this->data[$this->alias]['start'];
			$this->data[$this->alias]['enrollment_limit'] = $this->_calculateEnrollmentLimit($start);
		}

		return parent::beforeSave($options);
	}

}
