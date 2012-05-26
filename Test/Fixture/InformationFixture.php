<?php
/**
 * InformationFixture
 *
 */
class InformationFixture extends CakeTestFixture {

/**
 * Import
 *
 * @var array
 */
	public $import = array('model' => 'Information');

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'user_id' => 1,
			'mobile' => '(11) 1111-1111',
			'cpf' => '111.111.111-11',
			'twitter' => 'Lorem',
			'github' => 'Lorem'
		),
	);
}
