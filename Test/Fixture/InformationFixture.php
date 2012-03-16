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
			'mobile' => 'Lorem ipsum d',
			'cpf' => 'Lorem ipsum d',
			'twitter' => 'Lorem ipsum dolor sit amet',
			'github' => 'Lorem ipsum dolor sit amet'
		),
	);
}
