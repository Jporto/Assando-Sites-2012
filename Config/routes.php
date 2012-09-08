<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

// Home
Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));

// Control Panel
Router::connect('/admin', array('controller' => 'users', 'action' => 'index', 'admin' => true));

// Newsletter
Router::redirect('/newsletter', 'http://eepurl.com/jzZd5', array('status' => 307));

// Load all plugin routes
CakePlugin::routes();

// Load the CakePHP default routes
require CAKE . 'Config' . DS . 'routes.php';
