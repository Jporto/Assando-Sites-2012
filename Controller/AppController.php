<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');
App::uses('Security', 'Utility');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

/**
 * Components
 * 
 * @var array
 */
	public $components = array(
		'Session',
		'Cookie',
		'RequestHandler',
		'Email',
		'Security'
	);

/**
 * Helpers
 * 
 * @var array
 */
	public $helpers = array(
		'Html' => array('className' => 'TwitterBootstrap.BootstrapHtml'),
		'Form' => array('className' => 'TwitterBootstrap.BootstrapForm'),
		'Paginator' => array('className' => 'TwitterBootstrap.BootstrapPaginator'),
		'Utils.Gravatar' => array('default' => 'mm'),
		'Time',
		'Number'
	);

/**
 * Verifica se a requisição possui um prefixo
 *
 * @param  string  $prefix Nome do prefixo
 *
 * @return boolean
 */
	protected function _isPrefix($prefix) {
		return (isset($this->request->params['prefix']) && ($this->request->params['prefix'] === $prefix));
	}

/**
 * Antes de filtrar
 *
 * 1 - Define o layout do prefixo 'admin'
 *
 * @return void
 */
	public function beforeFilter() {
		// Bcrypt
		Security::setHash('blowfish');

		// Admin layout
		if ($this->_isPrefix('admin')) {
			$this->layout = 'admin';
		}

		$this->set('bodyClass', sprintf('%s %s %s',
			strtolower($this->name), strtolower($this->name) . '-' . strtolower($this->action), join(' ', $this->params['pass'])));

		return parent::beforeFilter();
	}

/**
 * Antes de renderizar
 *
 * 1 - Define o title da página
 *
 * @return void
 */
	public function beforeRender() {
		// Título definido?
		if (isset($this->viewVars['title_for_layout']) && !empty($this->viewVars['title_for_layout'])) {
			if ($this->_isPrefix('admin')) {
				$this->viewVars['title_for_layout'] .= ' | Painel de Controle';
			}
		}

		return parent::beforeRender();
	}

}
