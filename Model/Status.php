<?php

App::uses('AppModel', 'Model');
App::uses('Inflector', 'Utils');

/**
 * Status Model
 *
 * @property Attachment $Attachment
 * @property Course $Course
 * @property Enrollment $Enrollment
 * @property Group $Group
 * @property Lesson $Lesson
 * @property Payment $Payment
 * @property User $User
 */
class Status extends AppModel {

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
		array('id' => 1, 'name' => 'Ativo', 'model' => null),

		# Turmas
		array('id' => 2, 'name' => 'Inscrições abertas', 'model' => 'Course'),
		array('id' => 3, 'name' => 'Inscrições fechadas', 'model' => 'Course'),

		# Pagamentos
		array('id' => 10, 'name' => 'Iniciado', 'model' => 'Payment'),
		array('id' => 11, 'name' => 'Pendente', 'model' => 'Payment'),
		array('id' => 12, 'name' => 'Em análise', 'model' => 'Payment'),
		array('id' => 13, 'name' => 'Confirmado', 'model' => 'Payment'),
		array('id' => 14, 'name' => 'Disponível', 'model' => 'Payment'),
		array('id' => 15, 'name' => 'Em disputa', 'model' => 'Payment'),
		array('id' => 16, 'name' => 'Ressarcido', 'model' => 'Payment'),
		array('id' => 17, 'name' => 'Cancelado', 'model' => 'Payment'),
	);

/**
 * Registros ativos
 */
	const ATIVO = 1;

/**
 * Turmas
 */
	const INSCRICOES_ABERTAS = 2;
	const INSCRICOES_FECHADAS = 3;

/**
 * Pagamentos
 */
	const PAGAMENTO_INICIADO = 10;
	const PAGAMENTO_PENDENTE = 11;
	const PAGAMENTO_EM_ANALISE = 12;
	const PAGAMENTO_CONFIRMADO = 13;
	const PAGAMENTO_DISPONIVEL = 14;
	const PAGAMENTO_EM_DISPUTA = 15;
	const PAGAMENTO_RESSARCIDO = 16;
	const PAGAMENTO_CANCELADO = 17;

}
