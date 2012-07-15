<?php

App::uses('View', 'View');
App::uses('BootstrapHelper', 'View/Helper');

/**
 * BootstrapHelper Test Case
 *
 */
class BootstrapHelperTest extends CakeTestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$View = new View();
		$this->Bootstrap = new BootstrapHelper($View);
	}

/**
 * Test label
 * 
 * @return string
 */
	public function testLabel() {
		$expected = array('tag' => 'span', 'class' => 'label', 'content' => 'Hello World');
		$this->assertTag($expected, $this->Bootstrap->label('Hello World'));

		$expected = array('tag' => 'span', 'class' => 'label label-important', 'content' => 'Error! :(');
		$this->assertTag($expected, $this->Bootstrap->label('Error! :(', 'important'));

		$expected = array('tag' => 'span', 'class' => 'label label-success', 'content' => 'Confirmado');
		$this->assertTag($expected, $this->Bootstrap->label('Confirmado', 'success'));
	}

/**
 * Test label
 * 
 * @return string
 */
	public function testBadge() {
		$expected = array('tag' => 'span', 'class' => 'badge', 'content' => '1');
		$this->assertTag($expected, $this->Bootstrap->badge(1));

		$expected = array('tag' => 'span', 'class' => 'badge badge-important', 'content' => '2');
		$this->assertTag($expected, $this->Bootstrap->badge(2, 'important'));
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Bootstrap);

		parent::tearDown();
	}

}
