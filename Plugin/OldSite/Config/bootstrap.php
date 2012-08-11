<?php

App::uses('ConnectionManager', 'Model');

ConnectionManager::create('oldSite', array(
	'datasource' => 'Database/Mysql',
	'persistent' => false,
	'host' => 'localhost',
	'login' => 'assando_sites',
	'password' => 'assando_sites',
	'database' => 'assando_sites',
	'encoding' => 'utf8'
));