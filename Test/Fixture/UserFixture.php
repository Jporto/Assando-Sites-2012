<?php

class UserFixture extends CakeTestFixture {

	public $import = array('model' => 'User');

	public $records = array(
		array(
			'id' => 1,
			'group_id' => 1,
			'name' => 'Lorem',
			'surname' => 'Ipsum',
			'email' => 'lorem@ipsum.com',
			'password' => 'lorem',
			'status_id' => 1,
			'created' => '2012-03-15 20:18:51',
			'modified' => '2012-03-15 20:18:51'
		),
	);
}
