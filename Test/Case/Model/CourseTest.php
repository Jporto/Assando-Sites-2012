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
	public $fixtures = array('app.course', 'app.enrollment', 'app.lesson');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Course = ClassRegistry::init('Course');
		$this->Course->Status->useDbConfig = 'arrayDatasource';
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

		// Terceiro registro
		$this->Course->create();
		$this->Course->save(array(
			'name' => 'Turma 2011.2 - Curso Avançado'
		));

		$result = $this->Course->field('slug');
		$expected = 'turma-2011-2-curso-avancado-2';

		$this->assertEquals($expected, $result, 'O slug gerado está incorreto');
	}

/**
 * Testa o limite automático de inscrições
 * 
 * @return  void
 */
	public function testAutoEnrollmentLimitDate() {
		// Primeiro registro
		$this->Course->create();
		$this->Course->save(array(
			'name' => 'Turma 2012.3',
			'start' => '2012-05-27 16:00',
			'end' => '2012-06-26 19:00'
		));

		$result = $this->Course->field('enrollment_limit');
		$expected = '2012-05-20 23:59:59';

		$this->assertEquals($expected, $result, 'A data de término das inscrições está incorreta');

		// Segundo registro
		$this->Course->create();
		$this->Course->save(array(
			'name' => 'Turma 2012.4',
			'start' => '2012-08-02 21:00',
			'end' => '2012-08-09 19:00'
		));

		$result = $this->Course->field('enrollment_limit');
		$expected = '2012-07-26 23:59:59';

		$this->assertEquals($expected, $result, 'A data de término das inscrições está incorreta');
	}

/**
 * Testa os métodos de cálculo de preço do curso
 * 
 * @return  void
 */
	public function testPricesWithDiscount() {
		// Primeiro registro (começa em 2 meses e 1 semana)
		$this->Course->create();
		$this->Course->save(array(
			'name' => 'Turma 2012.3',
			'price' => 199.50,
			'start' => date(DB_DATETIME_FORMAT, strtotime('+2 months 1 week')),
		));

		$result = $this->Course->currentPrice();
		$expected = 140.0;

		$this->assertEquals($expected, $result, 'O preço atual do curso (que começa em 2 meses e 1 semana) está incorreto');

		// Segundo registro (começa em 1 mês e 1 semana)
		$this->Course->create();
		$this->Course->save(array(
			'name' => 'Turma 2012.4',
			'price' => 300,
			'start' => date(DB_DATETIME_FORMAT, strtotime('+1 month 1 week')),
		));

		$result = $this->Course->currentPrice();
		$expected = 210;

		$this->assertEquals($expected, $result, 'O preço atual do curso (que começa em 1 mês e 1 semana) está incorreto');

		// Terceiro (começa após o limite de 15 dias)
		$this->Course->create();
		$this->Course->save(array(
			'name' => 'Turma 2012.5',
			'price' => 50,
			'start' => date(DB_DATETIME_FORMAT, strtotime('+22 days')),
		));

		$result = $this->Course->currentPrice();
		$expected = 43;

		$this->assertEquals($expected, $result, 'O preço atual do curso (que começa em 22 dias) está incorreto');
	}

/**
 * Testa os métodos de cálculo de preço do curso sem desconto
 * 
 * @return  void
 */
	public function testPricesWithoutDiscount() {
		// Primeiro registro (começa em 2 semanas)
		$this->Course->create();
		$this->Course->save(array(
			'name' => 'Turma 2012.3',
			'price' => 200,
			'start' => date(DB_DATETIME_FORMAT, strtotime('+2 weeks')),
		));

		$result = $this->Course->currentPrice();
		$expected = 200;

		$this->assertEquals($expected, $result, 'O preço atual do curso (que começa em 2 semanas) está incorreto');
	}

/**
 * Testa a busca de turmas coms inscrições abertas
 * 
 * @return  void
 */
	public function testFindOpenCourses() {
		$result = $this->Course->findOpenCourses('count');
		$expected = 0;

		$this->assertEquals($expected, $result, 'Foi encontrado um curso com inscrições fechadas');

		// Primeiro registro (começou a um mês)
		$this->Course->create();
		$this->Course->save(array(
			'name' => 'Turma 2012.3',
			'status_id' => Status::INSCRICOES_FECHADAS,
			'start' => date(DB_DATETIME_FORMAT, strtotime('-1 month')),
		));

		// Segundo registro (começa em 2 semanas)
		$this->Course->create();
		$this->Course->save(array(
			'name' => 'Turma 2012.4',
			'status_id' => Status::INSCRICOES_ABERTAS,
			'start' => date(DB_DATETIME_FORMAT, strtotime('+2 weeks')),
		));

		// Segundo registro (começa hoje)
		$this->Course->create();
		$this->Course->save(array(
			'name' => 'Turma 2012.5',
			'status_id' => Status::INSCRICOES_FECHADAS,
			'start' => date(DB_DATETIME_FORMAT, strtotime('today')),
		));

		// Segundo registro (começa em 1 mês)
		$this->Course->create();
		$this->Course->save(array(
			'name' => 'Turma 2012.6',
			'status_id' => Status::INSCRICOES_ABERTAS,
			'start' => date(DB_DATETIME_FORMAT, strtotime('+1 month')),
		));

		$result = $this->Course->findOpenCourses('count');
		$expected = 2;

		$this->assertEquals($expected, $result, 'Foi encontrado um número incorreto de cursos com inscrições abertas');
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
