<?php

$config = array(
	'Enrollment' => array(
		'limit' => '1 week',

		'discounts' => array(
			array('limit' => '1 month', 'value' => 30), // 30% de desconto até 1 mês antes
			array('limit' => '15 days', 'value' => 15), // 15% de desconto até 15 dias antes
		)
	)
);