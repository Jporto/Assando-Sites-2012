<?php
App::uses('HighrisePerson', 'Model');

/**
 * HighrisePerson Test Case
 *
 */
class HighrisePersonTestCase extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.highrise_person', 'app.user', 'app.group', 'app.status', 'app.address', 'app.information', 'app.enrollment', 'app.course', 'app.lesson', 'app.payment');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->HighrisePerson = ClassRegistry::init('HighrisePerson');
	}

/**
 * Herdou de model?
 *
 * @return void
 */
	public function testModelObject() {
		$expected = 'Model';
		$result = $this->HighrisePerson;

		$this->assertInstanceOf($expected, $result, 'Objeto não extendeu Model');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->HighrisePerson);

		parent::tearDown();
	}

}
