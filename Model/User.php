<?php

App::uses('AppModel', 'Model');

/**
 * User Model
 *
 * @property Group $Group
 * @property Status $Status
 * @property Address $Address
 * @property Enrollment $Enrollment
 * @property HighrisePerson $HighrisePerson
 * @property Information $Information
 * @property Payment $Payment
 */
class User extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'surname' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
			),
		),
		'password' => array(
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
	public $belongsTo = array('Group', 'Status');

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Address' => array('dependent' => true),
		'HighrisePerson' => array('dependent' => true),
		'Information' => array('dependent' => true),
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Enrollment' => array('dependent' => true),
		'Payment' => array('dependent' => true),
	);

/**
 * Encontra usuários que não são alunos
 * 
 * @param  string $findType Tipo de find
 * @param  array  $params   Parâmetros de busca
 * 
 * @return array
 */
	public function findStaff($findType = 'all', $params = array()) {
		// Lista de grupos válidos
		$groups = $this->Group->findStaff();

		// Não há o parâmetro de condições?
		if (!isset($params['conditions'])) {
			$params['conditions'] = array();
		}

		// Adiciona os parâmetros de busca
		$params['conditions'] = array_merge(array(
			'Group.id' => array_keys($groups)
		), $params['conditions']);

		return $this->find($findType, $params);
	}

/**
 * Encontra usuários que são alunos
 * 
 * @param  string $findType Tipo de find
 * @param  array  $params   Parâmetros de busca
 * 
 * @return array
 */
	public function findStudents($findType = 'all', $params = array()) {
		// Não há o parâmetro de condições?
		if (!isset($params['conditions'])) {
			$params['conditions'] = array();
		}

		// Adiciona os parâmetros de busca
		$params['conditions'] = array_merge(array(
			'Group.id' => Group::ALUNOS
		), $params['conditions']);

		return $this->find($findType, $params);
	}

}
