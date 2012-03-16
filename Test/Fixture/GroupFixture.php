<?php
/**
 * GroupFixture
 *
 */
class GroupFixture extends CakeTestFixture {

/**
 * Import
 *
 * @var array
 */
	public $import = array('model' => 'Group');

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'name' => 'Alunos',
			'staff' => 0,
			'status_id' => 1
		),
		array(
			'id' => 2,
			'name' => 'Financeiro',
			'staff' => 1,
			'status_id' => 1
		),
		array(
			'id' => 3,
			'name' => 'Administradores',
			'staff' => 1,
			'status_id' => 1
		),
	);
}
