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
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Status);

		parent::tearDown();
	}

}
