<?php
/**
 * AttachmentFixture
 *
 */
class AttachmentFixture extends CakeTestFixture {

/**
 * Import
 *
 * @var array
 */
	public $import = array('model' => 'Attachment');

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'lesson_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'file' => 'Lorem ipsum dolor sit amet',
			'status_id' => 1,
			'downloads' => 1,
			'created' => '2012-03-15 20:44:40',
			'modified' => '2012-03-15 20:44:40'
		),
	);
}
