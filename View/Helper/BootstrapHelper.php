<?php

class BootstrapHelper extends AppHelper {

	public $helpers = array('Html');

	public function label($text, $type = null, $params = array()) {
		$params = Hash::merge(array(
			'class' => 'label'
		), $params);

		if (!empty($type) && $type != 'default')
			$params['class'] .= ' label-' . $type;

		return $this->Html->tag('span', $text, $params);
	}

	public function badge($text, $type = null, $params = array()) {
		$params = Hash::merge(array(
			'class' => 'badge'
		), $params);

		if (!empty($type) && $type != 'default')
			$params['class'] .= ' badge-' . $type;

		return $this->Html->tag('span', $text, $params);
	}

}