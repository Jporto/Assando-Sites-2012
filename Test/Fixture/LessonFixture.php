<?php

/**
 * LessonFixture
 *
 */
class LessonFixture extends CakeTestFixture {

/**
 * Import
 *
 * @var array
 */
	public $import = array('model' => 'Lesson');

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'course_id' => 1,
			'title' => 'Lorem ipsum dolor sit amet',
			'subject' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'start' => '2012-03-15 20:44:42',
			'length' => 1,
			'status_id' => 1,
			'created' => '2012-03-15 20:44:42',
			'modified' => '2012-03-15 20:44:42'
		),
	);
}
