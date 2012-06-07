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
 * Calcula a data limite de inscrição
 * 
 * @return string
 */
	protected function _calculateEnrollmentLimit($start = null) {
		if (empty($start)) {
			$start = $this->field('start');
		}

		$courseStart = new DateTime($start);
		$timeInterval = DateInterval::createFromDateString(Configure::read('Enrollment.limit'));

		$enrollmentLimit = $courseStart->sub($timeInterval);
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
			$discountLimitTimestamp = strtotime('-' . $discount['limit'], $enrollmentLimitTimestamp);

			// Se o limite do desconto for após a data da inscrição
			if ($discountLimitTimestamp > $enrollmentWhenTimestamp) {
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
 * Após encontrar cursos
 * 
 * @param  array  $results Lista de resultados
 * @param  boolean $primary Primeiro model buscado?
 * 
 * @return array
 */
	public function afterFind($results, $primary = false) {
		foreach ($results as &$result) {
			if (isset($result[$this->alias]) && isset($result[$this->alias]['id'])) {
				$this->id = $result[$this->alias]['id'];
				$result[$this->alias]['current_price'] = $this->currentPrice();
			}
		}

		return parent::afterFind($results, $primary);
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
