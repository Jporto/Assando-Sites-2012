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
 * Lista de status do PayPal
 * 
 * Canceled_Reversal: A reversal has been canceled.
 * Completed: The payment has been completed, and the funds have been added successfully to your account balance.
 * Created: A German ELV payment is made using Express Checkout.
 * Denied: You denied the payment.
 * Expired: This authorization has expired and cannot be captured.
 * Failed: The payment has failed.
 * Pending: The payment is pending.
 * Refunded: You refunded the payment.
 * Reversed: A payment was reversed due to a chargeback or other type of reversal.
 * Processed: A payment has been accepted.
 * Voided: This authorization has been voided.
 * 
 * @var array
 */
	protected $_PayPalStatuses = array(
		'Canceled_Reversal',
		'Completed',
		'Created',
		'Denied',
		'Expired',
		'Failed',
		'Pending',
		'Refunded',
		'Reversed',
		'Processed',
		'Voided',
	);

/**
 * Converte o status de pagamento do PagSeguro para o status usado pela aplicação
 * 
 * @param integer
 */
	public function pagSeguroStatus($status) {
		if (!isset($this->_PagSeguroStatuses[$status])) {
			return false;
		}

		switch ($this->_PagSeguroStatuses[$status]) {
			case 'INITIATED':
				return Status::PAGAMENTO_INICIADO;
			case 'WAITING_PAYMENT':
				return Status::PAGAMENTO_PENDENTE;
			case 'IN_ANALYSIS':
				return Status::PAGAMENTO_EM_ANALISE;
			case 'PAID':
				return Status::PAGAMENTO_CONFIRMADO;
			case 'AVAILABLE':
				return Status::PAGAMENTO_DISPONIVEL;
			case 'IN_DISPUTE':
				return Status::PAGAMENTO_EM_DISPUTA;
			case 'REFUNDED':
				return Status::PAGAMENTO_RESSARCIDO;
			case 'CANCELLED':
			default:
				return Status::PAGAMENTO_CANCELADO;
		}
	}

/**
 * Converte o status de pagamento do PayPal para o status usado pela aplicação
 * 
 * @param integer
 */
	public function payPalStatus($status) {
		if (!in_array($status, $this->_PayPalStatuses)) {
			return false;
		}

		switch ($status) {
			case 'Created':
				return Status::PAGAMENTO_INICIADO;
			case 'Pending':
				return Status::PAGAMENTO_EM_ANALISE;
			case 'Processed':
				return Status::PAGAMENTO_CONFIRMADO;
			case 'Completed':
				return Status::PAGAMENTO_DISPONIVEL;
			case 'Reversed':
			case 'Refunded':
				return Status::PAGAMENTO_RESSARCIDO;
			case 'Failed':
			default:
				return Status::PAGAMENTO_CANCELADO;
		}
	}

}