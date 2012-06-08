<?php
App::uses('Status', 'Model');

/**
 * Status Test Case
 *
 */
class StatusTestCase extends CakeTestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Status = ClassRegistry::init('Status');
		$this->Status->useDbConfig = 'arrayDatasource';
	}

/**
 * Herdou de model?
 *
 * @return void
 */
	public function testModelObject() {
		$this->assertInstanceOf('Model', $this->Status, 'Objeto não extendeu Model');
	}

/**
 * Testa o datasource
 *
 * @return void
 */
	public function testDatabaseConfig() {
		$this->assertEquals('arrayDatasource', $this->Status->useDbConfig, 'Status não usa o arrayDatasource');
	}

/**
 * Testa os status genéricos
 *
 * @return void
 */
	public function testGenericStatuses() {
		$Status = $this->Status->find('first', array('conditions' => array('id' => Status::ATIVO)));
		$this->assertEquals('Ativo', $Status['Status']['name']);
	}

/**
 * Testa os status de turma
 *
 * @return void
 */
	public function testCourseStatuses() {
		$Status = $this->Status->find('first', array('conditions' => array('id' => Status::INSCRICOES_ABERTAS, 'model' => 'Course')));
		$this->assertEquals('Inscrições abertas', $Status['Status']['name']);

		$Status = $this->Status->find('first', array('conditions' => array('id' => Status::INSCRICOES_FECHADAS, 'model' => 'Course')));
		$this->assertEquals('Inscrições fechadas', $Status['Status']['name']);
	}

/**
 * Testa os status de pagamento
 *
 * @return void
 */
	public function testPaymentStatuses() {
		$Status = $this->Status->find('first', array('conditions' => array('id' => Status::PAGAMENTO_INICIADO, 'model' => 'Payment')));
		$this->assertEquals('Iniciado', $Status['Status']['name']);

		$Status = $this->Status->find('first', array('conditions' => array('id' => Status::PAGAMENTO_PENDENTE, 'model' => 'Payment')));
		$this->assertEquals('Pendente', $Status['Status']['name']);

		$Status = $this->Status->find('first', array('conditions' => array('id' => Status::PAGAMENTO_EM_ANALISE, 'model' => 'Payment')));
		$this->assertEquals('Em análise', $Status['Status']['name']);

		$Status = $this->Status->find('first', array('conditions' => array('id' => Status::PAGAMENTO_CONFIRMADO, 'model' => 'Payment')));
		$this->assertEquals('Confirmado', $Status['Status']['name']);

		$Status = $this->Status->find('first', array('conditions' => array('id' => Status::PAGAMENTO_DISPONIVEL, 'model' => 'Payment')));
		$this->assertEquals('Disponível', $Status['Status']['name']);

		$Status = $this->Status->find('first', array('conditions' => array('id' => Status::PAGAMENTO_EM_DISPUTA, 'model' => 'Payment')));
		$this->assertEquals('Em disputa', $Status['Status']['name']);

		$Status = $this->Status->find('first', array('conditions' => array('id' => Status::PAGAMENTO_RESSARCIDO, 'model' => 'Payment')));
		$this->assertEquals('Ressarcido', $Status['Status']['name']);

		$Status = $this->Status->find('first', array('conditions' => array('id' => Status::PAGAMENTO_CANCELADO, 'model' => 'Payment')));
		$this->assertEquals('Cancelado', $Status['Status']['name']);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Status);

		parent::tearDown();
	}

}
