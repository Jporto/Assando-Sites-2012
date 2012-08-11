<?php
/**
 * This file is loaded automatically by the app/webroot/index.php file after core.php
 *
 * This file should load/create any application wide configuration settings, such as
 * Caching, Logging, loading additional configuration files.
 *
 * You should also use this file to include any files that provide global functions/constants
 * that your application uses.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.10.8.2117
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

// Constants
define('DB_DATETIME_FORMAT', 'Y-m-d H:i:s');

// Enable the Dispatcher filters for plugin assets, and
// CacheHelper.
Configure::write('Dispatcher.filters', array(
	'AssetDispatcher',
	'CacheDispatcher'
));

// Add logging configuration.
CakeLog::config('debug', array(
	'engine' => 'FileLog',
	'types' => array('notice', 'info', 'debug'),
	'file' => 'debug',
));
CakeLog::config('error', array(
	'engine' => 'FileLog',
	'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
	'file' => 'error',
));


// Default cache engine
Cache::config('default', array('engine' => 'File'));

// BRL Currency
App::uses('CakeNumber', 'Utility');
CakeNumber::addFormat('BRL', array('before' => 'R$ ', 'thousands' => '.', 'decimals' => ','));

// Carrega todos os plugins
CakePlugin::loadAll(array(
	'OldSite' => array('bootstrap' => true)
));