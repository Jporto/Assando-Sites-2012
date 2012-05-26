<?php

App::uses('AppModel', 'Model');

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
		array('id' => 2, 'name' => 'Inscrições abertas', 'model' => 'Course'),
		array('id' => 3, 'name' => 'Inscrições fechadas', 'model' => 'Course'),
	);

/**
 * Registros ativos
 */
	const ATIVO = 1;

/**
 * Turmas com inscrições abertas
 */
	const INSCRICOES_ABERTAS = 2;

/**
 * Turmas com inscrições fechadas
 */
	const INSCRICOES_FECHADAS = 3;

}
