<?php
/**
 * EnrollmentFixture
 *
 */
class EnrollmentFixture extends CakeTestFixture {

/**
 * Import
 *
 * @var array
 */
	public $import = array('model' => 'Enrollment');

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'user_id' => 1,
			'course_id' => 1,
			'status_id' => 1,
			'created' => '2012-03-15 20:44:40',
			'modified' => '2012-03-15 20:44:40'
		),
	);
}
