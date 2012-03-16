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
			'group_id' => 1,
			'name' => 'Lorem',
			'surname' => 'Ipsum',
			'email' => 'lorem.ipsum@dolor.com',
			'password' => 'lorem',
			'status_id' => 1,
			'created' => '2012-03-15 20:44:43',
			'modified' => '2012-03-15 20:44:43'
		),
	);
}
