<?php
App::uses('AppModel', 'Model');

/**
 * Model de usuários
 *
 * @property Address $Address
 * @property HighrisePerson $HighrisePerson
 * @property Information $Information
 * @property Group $Group
 * @property Status $Status
 * @property Enrollment $Enrollment
 * @property Payment $Payment
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Address' => array('dependent' => true),
		'HighrisePerson' => array('dependent' => true),
		'Information' => array('dependent' => true)
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Group',
		'Status'
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Enrollment' => array('dependent' => true),
		'Payment' => array('dependent' => true)
	);

}
