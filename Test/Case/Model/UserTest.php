<?php
App::uses('User', 'Model');
App::uses('Security', 'Utility');

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
	public $fixtures = array('app.user', 'app.status', 'app.group', 'app.address', 'app.highrise_person', 'app.information', 'app.enrollment', 'app.course', 'app.lesson', 'app.payment');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		// User model
		$this->User = ClassRegistry::init('User');

		// Bcrypt
		Security::setHash('blowfish');
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
 * 
 * @return void
 */
	public function testDependentModelRelation($model) {
		$relatedModel = $this->User->getAssociated('Address');
		$this->assertTrue($relatedModel['dependent'], "Address não depende de User");

		$relatedModel = $this->User->getAssociated('HighrisePerson');
		$this->assertTrue($relatedModel['dependent'], "HighrisePerson não depende de User");

		$relatedModel = $this->User->getAssociated('Information');
		$this->assertTrue($relatedModel['dependent'], "Information não depende de User");

		$relatedModel = $this->User->getAssociated('Enrollment');
		$this->assertTrue($relatedModel['dependent'], "Enrollment não depende de User");

		$relatedModel = $this->User->getAssociated('Payment');
		$this->assertTrue($relatedModel['dependent'], "Payment não depende de User");
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
		$this->assertInternalType('array', $result, 'O resultado de User::findStudents() não é um array');
		$this->assertCount(2, $result, 'O resultado de User::findStudents() deve conter 2 registros');

		$result = $this->User->findStudents('active');
		$this->assertInternalType('array', $result, 'O resultado de User::findStudents(active) não é um array');
		$this->assertCount(1, $result, 'O resultado de User::findStudents(active) deve conter 1 registro');
	}

/**
 * Testa dados inválidos
 * 
 * @return void
 */
	public function testInvalidData() {
		$this->User->create();
		$this->assertFalse($this->User->save(), 'Foi possível salvar um usuário sem dados');

		// Nome em branco
		$this->User->create();
		$this->assertFalse($this->User->save(array(
			'group_id' => Group::ALUNOS,
			'name' => '',
			'surname' => 'Belem',
			'email' => 'contato@thiagobelem.net'
		)), 'Foi possível salvar um usuário sem nome');
		$this->assertArrayHasKey('name', $this->User->validationErrors);
		$this->assertContains('Digite o nome', $this->User->validationErrors['name']);

		// Sobrenome em branco
		$this->User->create();
		$this->assertFalse($this->User->save(array(
			'group_id' => Group::ALUNOS,
			'name' => 'Thiago',
			'surname' => '',
			'email' => 'contato@thiagobelem.net'
		)), 'Foi possível salvar um usuário sem sobrenome');
		$this->assertArrayHasKey('surname', $this->User->validationErrors);
		$this->assertContains('Digite o sobrenome', $this->User->validationErrors['surname']);

		// Email em branco
		$this->User->create();
		$this->assertFalse($this->User->save(array(
			'group_id' => Group::ALUNOS,
			'name' => 'Thiago',
			'surname' => 'Belem',
			'email' => ''
		)), 'Foi possível salvar um usuário sem email');
		$this->assertArrayHasKey('email', $this->User->validationErrors);
		$this->assertContains('Digite o email', $this->User->validationErrors['email']);

		// Email inválido
		$this->User->create();
		$this->assertFalse($this->User->save(array(
			'group_id' => Group::ALUNOS,
			'name' => 'Thiago',
			'surname' => 'Belem',
			'email' => 'wwww.internet.com'
		)), 'Foi possível salvar um usuário com email inváido');
		$this->assertArrayHasKey('email', $this->User->validationErrors);
		$this->assertContains('Email inválido', $this->User->validationErrors['email']);

		// Senha em branco
		$this->User->create();
		$this->assertFalse($this->User->save(array(
			'group_id' => Group::ALUNOS,
			'name' => 'Thiago',
			'surname' => 'Belem',
			'email' => 'contato@thiagobelem.net',
			'password' => ''
		)), 'Foi possível salvar um usuário sem senha');
		$this->assertArrayHasKey('password', $this->User->validationErrors);
		$this->assertContains('Digite uma senha', $this->User->validationErrors['password']);

		// Senha insegura (sem letas)
		$this->User->create();
		$this->assertFalse($this->User->save(array(
			'group_id' => Group::ALUNOS,
			'name' => 'Thiago',
			'surname' => 'Belem',
			'email' => 'contato@thiagobelem.net',
			'password' => '123456'
		)), 'Foi possível salvar um usuário com uma senha sem letras');
		$this->assertArrayHasKey('password', $this->User->validationErrors);
		$this->assertContains('A senha deve conter letras e números', $this->User->validationErrors['password']);

		// Senha insegura (sem números)
		$this->User->create();
		$this->assertFalse($this->User->save(array(
			'group_id' => Group::ALUNOS,
			'name' => 'Thiago',
			'surname' => 'Belem',
			'email' => 'contato@thiagobelem.net',
			'password' => 'amor'
		)), 'Foi possível salvar um usuário com uma senha sem números');
		$this->assertArrayHasKey('password', $this->User->validationErrors);
		$this->assertContains('A senha deve conter letras e números', $this->User->validationErrors['password']);

		// Senha insegura (tamanho)
		$this->User->create();
		$this->assertFalse($this->User->save(array(
			'group_id' => Group::ALUNOS,
			'name' => 'Thiago',
			'surname' => 'Belem',
			'email' => 'contato@thiagobelem.net',
			'password' => '1a2b3c'
		)), 'Foi possível salvar um usuário com uma senha pequena');
		$this->assertArrayHasKey('password', $this->User->validationErrors);
		$this->assertContains('A senha deve conter pelo menos 8 caracteres', $this->User->validationErrors['password']);
	}

/**
 * Testa dados válidos
 * 
 * @return void
 */
	public function testValidData() {
		$this->User->create();
		$this->assertInternalType('array', $this->User->save(array(
			'group_id' => Group::ALUNOS,
			'name' => 'Thiago',
			'surname' => 'Belem',
			'email' => 'contato@thiagobelem.net',
			'password' => uniqid() // random password
		)), 'Não foi possível salvar um usuário com dados válidos');

		// Tenta criar outro usuário com o mesmo email (dados válidos, mas email repetido)
		$this->User->create();
		$this->assertFalse($this->User->save(array(
			'group_id' => Group::ALUNOS,
			'name' => 'Fulano',
			'surname' => 'Silva',
			'email' => 'contato@thiagobelem.net',
			'password' => uniqid() // random password
		)), 'Foi possível salvar um usuário com email repetido');
	}

/**
 * Testa a encriptação de senha
 * 
 * @return void
 */
	public function testPasswordEncryption() {
		$password = uniqid();

		// Cria um usuário
		$this->User->create();
		$this->User->save(array(
			'group_id' => Group::ALUNOS,
			'name' => 'Thiago',
			'surname' => 'Belem',
			'email' => 'contato@thiagobelem.net',
			'password' => $password // random password
		));

		$storedPassword = $this->User->field('password');
		$newPassword = Security::hash($password, 'blowfish', $storedPassword);
		$this->assertEquals($newPassword, $storedPassword, 'A senha não foi encriptada corretamente');

		// Salva o usuário com a senha vazia (mantendo a atual)
		$this->assertInternalType('array', $this->User->save(array(
			'name' => 'Fulano',
			'password' => ''
		)), 'Ñão foi possível trocar apenas o nome do usuário');

		$storedPassword = $this->User->field('password');
		$this->assertEquals($newPassword, $storedPassword, 'A senha vazia foi encriptada novamente');

		// Troca a senha do usuário
		$password = uniqid();
		$this->assertInternalType('array', $this->User->save(array(
			'password' => $password
		)), 'Ñão foi possível trocar apenas o senha do usuário');

		$storedPassword = $this->User->field('password');
		$newPassword = Security::hash($password, 'blowfish', $storedPassword);
		$this->assertEquals($newPassword, $storedPassword, 'A nova senha não foi encriptada corretamente');
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
