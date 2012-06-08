<?php

App::uses('AppModel', 'Model');
App::uses('Status', 'Model');

/**
 * PaymentGateway Model
 *
 * @property Payment $Payment
 */
class PaymentGateway extends AppModel {

/**
 * Array Datasource
 * 
 * @var string
 */
	public $useDbConfig = 'arrayDatasource';

/**
 * Status records
 * 
 * @var array
 */
	public $records = array(
		array('id' => 1, 'name' => 'PagSeguro'),
		array('id' => 2, 'name' => 'PayPal'),
	);

/**
 * Gateways
 */
	const PAGSEGURO = 1;
	const PAYPAL = 2;

/**
 * Lista de status do PagSeguro
 * 
 * @var array
 */
	protected $_PagSeguroStatuses = array(
		0 => 'INITIATED',
		1 => 'WAITING_PAYMENT',
		2 => 'IN_ANALYSIS',
		3 => 'PAID',
		4 => 'AVAILABLE',
		5 => 'IN_DISPUTE',
		6 => 'REFUNDED',
		7 => 'CANCELLED'
	);

/**
 * Converte o status de pagamento do PagSeguro para o status usado pela aplicação
 * 
 * @param integer
 */
	public function pagSeguroStatus($status) {
		$PagSeguroStatus = $this->_PagSeguroStatuses[$status];

		switch ($PagSeguroStatus) {
			case 'INITIATED':		return Status::PAGAMENTO_INICIADO;
			case 'WAITING_PAYMENT':	return Status::PAGAMENTO_PENDENTE;
			case 'IN_ANALYSIS':		return Status::PAGAMENTO_EM_ANALISE;
			case 'PAID':			return Status::PAGAMENTO_CONFIRMADO;
			case 'AVAILABLE':		return Status::PAGAMENTO_DISPONIVEL;
			case 'IN_DISPUTE':		return Status::PAGAMENTO_EM_DISPUTA;
			case 'REFUNDED':		return Status::PAGAMENTO_RESSARCIDO;
			case 'CANCELLED':		return Status::PAGAMENTO_CANCELADO;
		}

		return false;
	}

}