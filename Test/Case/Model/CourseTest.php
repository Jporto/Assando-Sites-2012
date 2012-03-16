<?php
App::uses('Course', 'Model');

/**
 * Course Test Case
 *
 */
class CourseTestCase extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.course', 'app.status', 'app.enrollment', 'app.lesson');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Course = ClassRegistry::init('Course');
	}

/**
 * Herdou de model?
 *
 * @return void
 */
	public function testModelObject() {
		$expected = 'Model';
		$result = $this->Course;

		$this->assertInstanceOf($expected, $result, 'Objeto não extendeu Model');
	}

/**
 * Testa se o sluggable behavior está no model
 * 
 * @return  void
 */
	public function testSluggableBehaviorAttached() {
		$result = CakePlugin::loaded('Utils');
		$this->assertTrue($result, 'Utils plugin não está sendo carregado');

		$result = $this->Course->actsAs;
		$expected = 'Utils.Sluggable';

		$this->assertInternalType('array', $result, 'Course não tem behaviors');
		$this->assertArrayHasKey($expected, $result, 'Course não tem o Sluggable behavior');
	}

/**
 * Testa se o sluggable behavior está funcionando
 * 
 * @return  void
 */
	public function testSluggableBehavior() {
		$this->Course->create();
		$this->Course->save(array(
			'name' => 'Turma 2011.2 - Curso Avançado'
		));

		$result = $this->Course->field('slug');
		$expected = 'turma-2011-2-curso-avancado';

		$this->assertEquals($expected, $result, 'O slug gerado está incorreto');
	}

/**
 * Testa se o sluggable behavior está funcionando
 * 
 * @return  void
 */
	public function testSluggableBehaviorWithRepeatedTitle() {
		// Primeiro registro
		$this->Course->create();
		$this->Course->save(array(
			'name' => 'Turma 2011.2 - Curso Avançado'
		));

		$result = $this->Course->field('slug');
		$expected = 'turma-2011-2-curso-avancado';

		$this->assertEquals($expected, $result, 'O slug gerado está incorreto');

		// Segundo registro
		$this->Course->create();
		$this->Course->save(array(
			'name' => 'Turma 2011.2 - Curso Avançado'
		));

		$result = $this->Course->field('slug');
		$expected = 'turma-2011-2-curso-avancado-1';

		$this->assertEquals($expected, $result, 'O slug gerado está incorreto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Course);

		parent::tearDown();
	}

}
