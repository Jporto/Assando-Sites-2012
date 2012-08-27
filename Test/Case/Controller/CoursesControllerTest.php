<?php
App::uses('CoursesController', 'Controller');

/**
 * CoursesController Test Case
 *
 */
class CoursesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.course',
		'app.status',
		'app.enrollment',
		'app.user',
		'app.group',
		'app.address',
		'app.highrise_person',
		'app.information',
		'app.payment',
		'app.payment_gateway',
		'app.lesson'
	);

/**
 * testAdminIndex method
 *
 * @return void
 */
	public function testAdminIndex() {
	}

}
