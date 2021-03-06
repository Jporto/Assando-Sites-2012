<?php

App::uses('AppModel', 'Model');
App::uses('Group', 'Model');
App::uses('Security', 'Utility');

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
 * Virtual fields
 * 
 * @var array
 */
	public $virtualFields = array(
		'full_name' => 'CONCAT(User.name, " ", User.surname)'
	);

/**
 * Ordem padrão
 * 
 * @var array
 */
	public $order = array('User.created' => 'DESC');

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Escolha um grupo',
				'required' => 'create'
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Digite o nome',
				'required' => 'create'
			),
		),
		'surname' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Digite o sobrenome',
				'required' => 'create'
			),
		),
		'email' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Digite o email',
				'required' => 'create'
			),
			'email' => array(
				'rule' => array('email'),
				'message' => 'Email inválido',
				'required' => 'create'
			),
			'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'Email em uso, se você já foi aluno do curso, faça o login'
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Digite uma senha',
				'required' => 'create'
			),
			'safePassword' => array(
				'rule' => array('safePassword'),
				'message' => 'A senha deve conter letras e números',
			),
			'minLength' => array(
				'rule' => array('minLength', 8),
				'message' => 'A senha deve conter pelo menos 8 caracteres',
			),
		),
		'status_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Escolha um status'
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
 * Valida senhas seguras
 * 
 * @param  array $data Dados sendo salvos
 * 
 * @return boolean
 */
	public function safePassword($data) {
		$password = array_shift($data);

		// Deve ter letras
		if (!preg_match('/[a-z]+/', $password))
			return false;

		// Deve ter números
		if (!preg_match('/[0-9]+/', $password))
			return false;

		return true;
	}

/**
 * Retorna os parâmetros de busca para usuários que não são alunos
 * 
 * @param  array  $params   Parâmetros de busca
 * 
 * @return array
 */
	public function staffParams($params = array()) {
		$groups = $this->Group->findStaff();

		$params = Hash::merge(array(
			'conditions' => array(
				'Group.id' => array_keys($groups)
			)
		), $params);

		return $params;
	}

/**
 * Retorna os parâmetros de busca para alunos
 * 
 * @param  array  $params   Parâmetros de busca
 * 
 * @return array
 */
	public function studentParams($params = array()) {
		$params = Hash::merge(array(
			'conditions' => array(
				'Group.id' => Group::ALUNOS
			)
		), $params);

		return $params;
	}

/**
 * Encontra usuários que não são alunos
 * 
 * @param  string $findType Tipo de find
 * @param  array  $params   Parâmetros de busca
 * 
 * @return array
 */
	public function findStaff($findType = 'all', $params = array()) {
		return $this->find($findType, $this->staffParams($params));
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
		return $this->find($findType, $this->studentParams($params));
	}

/**
 * Antes de validar os dados
 *
 * Não salva a senha se ela estiver vazia
 * 
 * @return void
 */
	public function beforeValidate($options = array()) {
		// Existe senha mas ela está vazia?
		if (isset($this->data[$this->alias]['password'])) {
			if (empty($this->data[$this->alias]['password'])) {
				// Remove a senha do array
				unset($this->data[$this->alias]['password']);
			}
		}

		return parent::beforeValidate($options);
	}

/**
 * Antes de salvar os dados no banco
 *
 * Encripta a senha do usuário
 * 
 * @return void
 */
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$password = $this->data[$this->alias]['password'];
			$this->data[$this->alias]['password'] = Security::hash($password);
		}

		return parent::beforeSave($options);
	}

/**
 * Parâmetros de filtro por uma status
 * 
 * @param  array|int $status ID do status
 * @param  array  $params Parâmetros adicionais
 * 
 * @return array
 */
	public function filterByStatusParams($status = null, $params = array()) {
		// Sem parâmetro
		if (empty($status)) {
			$status = Status::ALUNO_PENDENTE;
		}

		return Hash::merge(array(
			'conditions' => array('User.status_id' => $status)
		), $params);
	}

/**
 * Parâmetros de filtro por uma turma
 * 
 * @param  array|int $course ID da turma
 * @param  array  $params Parâmetros adicionais
 * 
 * @return array
 */
	public function filterByCourseParams($course, $params = array()) {
		// Lista de usuários matriculados na turma
		$Users = $this->Enrollment->find('list', array(
			'fields' => array('Enrollment.user_id'),
			'conditions' => array('Enrollment.course_id' => $course),
		));

		if (empty($Users)) {
			return $params;
		}

		return Hash::merge(array(
			'conditions' => array('User.id' => $Users)
		), $params);
	}

/**
 * Parâmetros de de busca por texto
 * 
 * @param  string $search Texto a ser buscado
 * @param  array  $params Parâmetros adicionais
 * 
 * @return array
 */
	public function searchParams($search, $params = array()) {
		$search = '%' . strtolower(trim($search, '%')) . '%';

		return Hash::merge(array(
			'conditions' => array(
				'OR' => array(
					'User.name LIKE' => $search,
					'User.surname LIKE' => $search,
					'User.email LIKE' => $search
				)
			)
		), $params);
	}

}
