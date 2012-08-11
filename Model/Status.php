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
		array('id' => 2, 'name' => 'Deletado', 'model' => null),

		# Turmas
		array('id' => 5, 'name' => 'Inscrições abertas', 'model' => 'Course'),
		array('id' => 6, 'name' => 'Inscrições fechadas', 'model' => 'Course'),

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
 * Status básicos
 */
	const PENDENTE = 0;
	const ATIVO = 1;
	const DELETADO = 2;

/**
 * Turmas
 */
	const INSCRICOES_ABERTAS = 5;
	const INSCRICOES_FECHADAS = 6;

/**
 * Matrículas
 */
	const MATRICULA_PENDENTE = 0;
	const MATRICULA_CONFIRMADA = 1;
	const MATRICULA_CANCELADA = 2;

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

/**
 * Alunos
 */
	const ALUNO_PENDENTE = 0;
	const ALUNO_CONFIRMADO = 1;
	const ALUNO_DELETADO = 2;

}
