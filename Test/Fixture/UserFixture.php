<?php
/**
 * UserFixture
 *
 */
class UserFixture extends CakeTestFixture {

/**
 * Import
 *
 * @var array
 */
	public $import = array('model' => 'User');

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'group_id' => 3, // Admin
			'name' => 'Admin',
			'surname' => 'Ipsum',
			'email' => 'admin.ipsum@dolor.com',
			'password' => 'admin',
			'status_id' => 1,
			'created' => '2012-03-15 20:44:43',
			'modified' => '2012-03-15 20:44:43'
		),
		array(
			'id' => 2,
			'group_id' => 1, // Aluno
			'name' => 'Lorem',
			'surname' => 'Ipsum',
			'email' => 'lorem.ipsum@dolor.com',
			'password' => 'lorem',
			'status_id' => 1,
			'created' => '2012-03-15 20:44:43',
			'modified' => '2012-03-15 20:44:43'
		),
		array(
			'id' => 3,
			'group_id' => 1, // Aluno
			'name' => 'Dolor',
			'surname' => 'Amet',
			'email' => 'amet@dolor.com',
			'password' => 'dolor',
			'status_id' => 0,
			'created' => '2012-03-15 20:44:43',
			'modified' => '2012-03-15 20:44:43'
		),
	);
}
