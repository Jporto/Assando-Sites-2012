<?php

App::uses('AppModel', 'Model');

/**
 * Group Model
 *
 * @property Status $Status
 * @property User $User
 */
class Group extends AppModel {

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
		'staff' => array(
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
	public $hasMany = array('User');

/**
 * Grupo de alunos
 */
	const ALUNOS = 1;

/**
 * Grupo de membros do financeiro
 */
	const FINANCEIRO = 2;

/**
 * Grupo de administradores
 */
	const ADMINISTRADORES = 3;

}
