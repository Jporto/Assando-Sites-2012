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
				'message' => 'Escolha uma turma'
			),
		),
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Campo obrigatório'
			),
		),
		'subject' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Campo obrigatório'
			),
		),
		'length' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Digite a duração (em minutos) da aula'
			),
		),
		'status_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Escolha uma status'
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
