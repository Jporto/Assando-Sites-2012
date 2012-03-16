<?php
App::uses('Group', 'Model');

/**
 * Group Test Case
 *
 */
class GroupTestCase extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.group', 'app.status', 'app.user', 'app.address', 'app.highrise_person', 'app.information', 'app.enrollment', 'app.course', 'app.lesson', 'app.payment');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Group = ClassRegistry::init('Group');
	}

/**
 * Herdou de model?
 *
 * @return void
 */
	public function testModelObject() {
		$expected = 'Model';
		$result = $this->Group;

		$this->assertInstanceOf($expected, $result, 'Objeto não extendeu Model');
	}

/**
 * Testa o Group::findStaff()
 * 
 * @covers Group::findStaff
 * 
 * @return void
 */
	public function testFindStaff() {
		$result = $this->Group->findStaff();
		$expected = 'array';

		$this->assertInternalType($expected, $result, 'O resultado de Group::findStaff() não é um array');
		$this->assertCount(2, $result, 'O resultado de Group::findStaff() deve ser igual a dois grupos');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Group);

		parent::tearDown();
	}

}
