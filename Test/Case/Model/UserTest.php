<?php
App::uses('User', 'Model');

/**
 * User Test Case
 *
 */
class UserTestCase extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.user', 'app.group', 'app.status', 'app.address', 'app.highrise_person', 'app.information', 'app.enrollment', 'app.course', 'app.lesson', 'app.payment', 'app.payment_gateway');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->User = ClassRegistry::init('User');
	}

/**
 * Herdou de model?
 *
 * @return void
 */
	public function testModelObject() {
		$expected = 'Model';
		$result = $this->User;

		$this->assertInstanceOf($expected, $result, 'Objeto não extendeu Model');
	}

/**
 * Verifica as relações de belongsTo
 * 
 * @return void
 */
	public function testBelongsTo() {
		$result = $this->User->getAssociated('belongsTo');

		$expected = 'Group';
		$this->assertContains($expected, $result, 'User não pertence à Group');

		$expected = 'Status';
		$this->assertContains($expected, $result, 'User não pertence à Status');
	}

/**
 * Verifica as relações de hasOne
 * 
 * @return void
 */
	public function testHasOne() {
		$result = $this->User->getAssociated('hasOne');

		$expected = 'Information';
		$this->assertContains($expected, $result, 'User não tem um Information');

		$expected = 'Address';
		$this->assertContains($expected, $result, 'User não tem um Address');

		$expected = 'HighrisePerson';
		$this->assertContains($expected, $result, 'User não tem um Address');
	}

/**
 * Verifica as relações de hasMany
 * 
 * @return void
 */
	public function testHasMany() {
		$result = $this->User->getAssociated('hasMany');

		$expected = 'Payment';
		$this->assertContains($expected, $result, 'User não tem vários Payment');

		$expected = 'Enrollment';
		$this->assertContains($expected, $result, 'User não tem vários Enrollment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->User);

		parent::tearDown();
	}

}
