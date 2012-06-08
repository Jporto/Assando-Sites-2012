<?php
App::uses('UsersController', 'Controller');

/**
 * TestUsersController
 */
class TestUsersController extends UsersController {

/**
 * Auto render
 *
 * @var boolean
 */
	public $autoRender = false;

/**
 * Redirect action
 *
 * @param mixed $url
 * @param mixed $status
 * @param boolean $exit
 * @return void
 */
	public function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}

}

/**
 * UsersController Test Case
 *
 */
class UsersControllerTestCase extends ControllerTestCase {

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
		$this->Users = new TestUsersController();
		$this->Users->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Users);

		parent::tearDown();
	}

/**
 * Testa a listagem de usuários
 *
 * @return void
 */
	public function testAdminIndex() {
		$result = $this->testAction('/admin', array('return' => 'vars'));

		$this->assertEquals('admin', $this->controller->layout, 'Users/index não está usando o layout "admin"');
		$this->assertEquals('admin_index', $this->controller->view, 'Users/index não está usando a view "admin_index"');
		$this->assertArrayHasKey('users', $result, 'Users/index não está retornando uma lista de usuários');
		$this->assertNotEmpty($result['users'], 'Users/index não está retornando usuários');
	}

}
