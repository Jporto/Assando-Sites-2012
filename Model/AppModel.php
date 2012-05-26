<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');
App::uses('BrValidation', 'Localized.Lib');

/**
 * Application model
 *
 * @package       app.Model
 */
class AppModel extends Model {

/**
 * Behaviors
 * 
 * @var array
 */
	public $actsAs = array('Containable');

/**
 * Busca recursiva por padrão?
 * 
 * @var array
 */
	public $recursive = false;

/**
 * Tipos de find
 * 
 * @var array
 */
	public $findMethods = array(
		# Métodos padrões
		'all' => true, 'first' => true, 'count' => true,
		'neighbors' => true, 'list' => true, 'threaded' => true,

		# Novos métodos
		'active' => true
	);

/**
 * Encontra apenas registros ativos
 * 
 * @param  string $state   Estado da consulta (after/before)
 * @param  array $query   Dados da consulta
 * @param  array  $results Resultados encontrados
 * 
 * @return array
 */
	protected function _findActive($state, $query, $results = array()) {
		if ($state == 'after') {
			return $results;
		}

		if ($this->hasField('status_id')) {
			$query['conditions'][$this->escapeField('status_id')] = 1;
		}

		return $query;
	}

/**
 * Gera o slug de uma string multibyte
 * 
 * @param  string $slug      O slug a ser gerado
 * @param  string $separator Caractere separador
 * 
 * @return string
 */
	public function multibyteSlug($slug, $separator) {
		$slug = (function_exists('mb_strtolower') ? mb_strtolower($slug) : strtolower($slug));

		return Inflector::slug($slug, $separator);
	}

/**
 * Valida telefones
 * 
 * @param  string $data O telefone
 * 
 * @return boolean
 */
	public function phone($data) {
		return BrValidation::phone(array_shift($data));
	}

/**
 * Valida CPF
 * 
 * @param  string $data O CPF
 * 
 * @return boolean
 */
	public function cpf($data) {
		return BrValidation::cpf(array_shift($data));
	}

}
