<?php
/**
 * StatusFixture
 *
 */
class StatusFixture extends CakeTestFixture {

/**
 * Formato dos registros
 * 
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false),
		'model' => array('type' => 'string', 'null' => true),
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array('id' => '1', 'name' => 'Ativo', 'model' => null),
	);

}