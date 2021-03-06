<?php

App::uses('AppModel', 'Model');
App::uses('Status', 'Model');

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
			'separator' => '-',
			'update' => true,
		)
	);

/**
 * Ordem padrão
 *
 * @var array
 */
	public $order = array('Course.start' => 'DESC');

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'code' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Digite o código do curso',
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Digite o nome do curso',
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
				'message' => 'Digite a descrição do curso',
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
				'message' => 'Escolha o status do curso',
			),
		),
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Status' => array(
			'conditions' => array(
				'Status.model' => 'Course'
			)
		)
	);

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
 * Subtrai um intervalo de uma data
 *
 * @param string|int $start A data inicial
 * @param string $internval O intervalo
 *
 * @return DateTime
 */
	protected function _subtractDate($start, $interval) {
		if (is_string($start)) {
			$start = new DateTime($start);
		} else if (is_integer($start)) {
			$DateTime = new DateTime();
			$DateTime->setTimestamp($start);

			$start = $DateTime;
		}

		// The interval
		$interval = DateInterval::createFromDateString(trim($interval, '-'));

		return $start->sub($interval);
	}

/**
 * Calcula a data limite de inscrição
 *
 * @return DateTime
 */
	protected function _calculateEnrollmentLimit($start = null) {
		if (empty($start)) {
			$start = $this->field('start');
		}

		$enrollmentLimit = $this->_subtractDate($start, Configure::read('Enrollment.limit'));
		$enrollmentLimit->setTime(23, 59, 59);

		return $enrollmentLimit;
	}

/**
 * Calcula o preço com desconto de um curso
 *
 * @param  float $price Preco total
 * @param  int $discount Desconto em (%)
 *
 * @return float
 */
	protected function _calculateCoursePriceWithDiscount($price, $discount) {
		$discount = $price * ($discount / 100);
		$price = ceil($price - $discount);

		return (float)$price;
	}

/**
 * Calcula o preço do curso em uma data específica
 *
 * @param  integeter $when The timestamp
 *
 * @return float
 */
	protected function _calculatePrice($when = 'now') {
		$coursePrice = $this->field('price');

		// Limite de inscrição
		$enrollmentLimit = $this->_calculateEnrollmentLimit();

		// Timestamps do limite de inscrição e da data de inscrição
		$enrollmentLimitTimestamp = $enrollmentLimit->getTimestamp();
		$enrollmentWhenTimestamp = strtotime($when);

		// Procura um desconto
		foreach (Configure::read('Enrollment.discounts') as $discount) {
			$discountLimit = $this->_subtractDate($enrollmentLimitTimestamp, $discount['limit']);

			// Se o limite do desconto for após a data da inscrição
			if ($discountLimit->getTimestamp() > $enrollmentWhenTimestamp) {
				return $this->_calculateCoursePriceWithDiscount($coursePrice, $discount['value']);
			}
		}

		return (float)$coursePrice;
	}

/**
 * Calcula o preço atual do cuso
 *
 * @return float
 */
	public function currentPrice() {
		return $this->_calculatePrice();
	}

/**
 * Busca cursos abertos
 *
 * @param  string $find   Tipo de find
 * @param  array  $params Parâmetros de busca
 *
 * @return array
 */
	public function findOpenCourses($find = 'all', $params = array()) {
		$params = Set::merge(array(
			'conditions' => array(
				'Course.status_id' => Status::INSCRICOES_ABERTAS,
				'Course.enrollment_limit > NOW()'
			),
			'order' => array(
				'Course.start' => 'ASC'
			),
			'contain' => array('Status')
		), $params);

		return $this->find($find, $params);
	}

/**
 * Busca cursos com inscrições fechadas
 *
 * @param  string $find   Tipo de find
 * @param  array  $params Parâmetros de busca
 *
 * @return array
 */
	public function findClosedCourses($find = 'all', $params = array()) {
		$params = Set::merge(array(
			'conditions' => array(
				'Course.status_id' => Status::INSCRICOES_FECHADAS,
				'Course.enrollment_limit <= NOW()'
			),
			'order' => array(
				'Course.start' => 'DESC'
			),
			'contain' => array('Status')
		), $params);

		return $this->find($find, $params);
	}

/**
 * Busca o próximo curso (inscrições abertas) ou o útlimo (inscrições fechadas)
 *
 * @param  boolean $advanced Modulo avançado?
 * @param  array  $params Parâmetros de busca
 *
 * @return array
 */
	public function findNextCourse($advanced = false, $params = array()) {
		$params = Set::merge(array(
			'conditions' => array(
				'Course.advanced' => (bool)$advanced
			),
		), $params);

		// Busca um curso com inscrições abertas
		$Course = $this->findOpenCourses('first', $params);

		// Nenhum curso com inscrições abertas?
		if (empty($Course)) {
			$Course = $this->findClosedCourses('first', $params);
		}

		return $Course;
	}

/**
 * Antes de validar
 *
 * @return boolean
 */
	public function beforeSave($options = array()) {
		if (!isset($this->data[$this->alias]['enrollment_limit']) && isset($this->data[$this->alias]['start'])) {
			$courseStart = $this->data[$this->alias]['start'];
			$enrollmentLimit = $this->_calculateEnrollmentLimit($courseStart);

			$this->data[$this->alias]['enrollment_limit'] = $enrollmentLimit->format(DB_DATETIME_FORMAT);
		}

		return parent::beforeSave($options);
	}

}
