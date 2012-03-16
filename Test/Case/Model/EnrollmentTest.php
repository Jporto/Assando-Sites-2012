<?php
App::uses('Enrollment', 'Model');

/**
 * Enrollment Test Case
 *
 */
class EnrollmentTestCase extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.enrollment', 'app.user', 'app.group', 'app.status', 'app.address', 'app.highrise_person', 'app.information', 'app.payment', 'app.course', 'app.lesson');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Enrollment = ClassRegistry::init('Enrollment');
	}

/**
 * Herdou de model?
 *
 * @return void
 */
	public function testModelObject() {
		$expected = 'Model';
		$result = $this->Enrollment;

		$this->assertInstanceOf($expected, $result, 'Objeto não extendeu Model');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Enrollment);

		parent::tearDown();
	}

}
