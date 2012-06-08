<?php
App::uses('AppModel', 'Model');
App::uses('Status', 'Model');

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
 * Retorna apenas grupos do staff
 * 
 * @param  string $findType Tipo de find
 * @param  array  $params   Parâmetros de busca
 * 
 * @return array
 */
	public function findStaff($findType = 'list', $params = array()) {
		// Não há o parâmetro de condições?
		if (!isset($params['conditions'])) {
			$params['conditions'] = array();
		}

		// Adiciona os parâmetros de busca
		$params['conditions'] = array_merge(array(
			'Group.staff' => true,
			'Group.status_id' => Status::ATIVO
		), $params['conditions']);

		return $this->find($findType, $params);
	}

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
