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
 * Verifica as relações dos models dependentes
 * 
 * @depends testHasOne
 * @depends testHasMany
 * @dataProvider dependentRelatedModelsProvider
 * 
 * @return void
 */
	public function testDependentModelRelation($model) {
		$related = $this->User->getAssociated($model);

		$this->assertTrue($related['dependent'], "{$model} não depende de User");
	}

/**
 * Provider de informações sobre a dependencia dos models relacionados
 * 
 * @return array
 */
	public function dependentRelatedModelsProvider() {
		return array(
			array('Address'),
			array('HighrisePerson'),
			array('Information'),
			array('Enrollment'),
			array('Payment'),
		);
	}

/**
 * Testa o User::findStaff()
 * 
 * @covers User::findStaff
 * 
 * @return void
 */
	public function testFindStaff() {
		$result = $this->User->findStaff();
		$expected = 'array';

		$this->assertInternalType($expected, $result, 'O resultado de User::findStaff() não é um array');
		$this->assertCount(1, $result, 'O resultado de User::findStaff() deve ser apenas um usuário');
	}

/**
 * Testa o User::findStudents()
 * 
 * @covers User::findStudents
 * 
 * @return void
 */
	public function testFindStudents() {
		$result = $this->User->findStudents();
		$expected = 'array';

		$this->assertInternalType($expected, $result, 'O resultado de User::findStudents() não é um array');
		$this->assertCount(2, $result, 'O resultado de User::findStudents() deve ser apenas um aluno');

		$result = $this->User->findStudents('active');
		$expected = 'array';

		$this->assertInternalType($expected, $result, 'O resultado de User::findStudents() não é um array');
		$this->assertCount(1, $result, 'O resultado de User::findStudents() deve ser apenas um aluno');
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
