<?php

/**
 * Lesson Test Case
 *
 */
class LessonTestCase extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.lesson', 'app.course', 'app.status', 'app.enrollment', 'app.user', 'app.group', 'app.address', 'app.highrise_person', 'app.information', 'app.payment');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Lesson = ClassRegistry::init('Lesson');
	}

/**
 * Herdou de model?
 *
 * @return void
 */
	public function testModelObject() {
		$expected = 'Model';
		$result = $this->Lesson;

		$this->assertInstanceOf($expected, $result, 'Objeto não extendeu Model');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Lesson);

		parent::tearDown();
	}

}
