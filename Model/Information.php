<?php

App::uses('AppModel', 'Model');

App::import('Vendor', 'TwitterOAuth/twitteroauth/twitteroauth');

/**
 * Information Model
 *
 * @property User $User
 */
class Information extends AppModel {

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array('User');

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'mobile' => array(
			'format' => array(
				'rule' => array('phone'),
				'message' => 'Telefone inválido',
			)
		),
		'cpf' => array(
			'format' => array(
				'rule' => array('cpf'),
				'message' => 'CPF inválido',
			)
		),
		'twitter' => array(
			'format' => array(
				'rule' => array('twitterProfileFormat'),
				'message' => 'Twitter inválido',
			),
			'exists' => array(
				'rule' => array('twitterProfileExists'),
				'message' => 'Este Twitter não existe',
			)
		),
	);

/**
 * Antes de validar as informações
 * 
 * @return boolean
 */
	public function beforeValidate($options = array()) {
		if (isset($this->data[$this->alias]['twitter'])) {
			$twitter = $this->data[$this->alias]['twitter'];

			$twitter = trim($twitter);
			$twitter = trim($twitter, '@');

			$this->data[$this->alias]['twitter'] = $twitter;
		}

		return parent::beforeValidate($options);
	}

/**
 * Valida o formato de um perfil do Twitter
 * 
 * @param  string $data Perfil do Twitter
 * 
 * @return boolean
 */
	public function twitterProfileFormat($data) {
		$profile = array_shift($data);

		return preg_match('/^([\w\d_]+)$/i', $profile);
	}

/**
 * Valida se o perfil do Twitter existe
 * 
 * @param  string $data Perfil do Twitter
 * 
 * @return boolean
 */
	public function twitterProfileExists($data) {
		$profile = array_shift($data);

		if (!isset($this->TwitterOAuth)) {
			// Instancia o TwitterOauth
			$this->TwitterOAuth = new TwitterOAuth(
				Configure::read('Twitter.Consumer.key'),
				Configure::read('Twitter.Consumer.secret'),
				Configure::read('Twitter.Access.token'),
				Configure::read('Twitter.Access.secret')
			);
		}

		// Busca pelo usuário
		$this->TwitterOAuth->get('users/show', array(
			'screen_name' => $profile,
			'include_entities' => false
		));

		$returnCode = $this->TwitterOAuth->http_code;

		return ($returnCode == 200);
	}
}
