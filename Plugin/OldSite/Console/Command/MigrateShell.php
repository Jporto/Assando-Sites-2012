<?php

class MigrateShell extends AppShell {

	public $uses = array(
		'User',
		'OldSite.OldUser',

		'Course',
		'OldSite.OldCourse',

		'Enrollment',
		'OldSite.OldEnrollment',
	);

	public function getOptionParser() {
		$parser = parent::getOptionParser();

		$parser->addSubcommand('students', array(
			'help' => "Migra os alunos do site antigo para o novo",
			'parser' => array(
				'options' => array(
					'delete-original' => array('boolean' => true, 'default' => false)
				)
			)
		));

		$parser->addSubcommand('courses', array(
			'help' => "Migra as turmas do site antigo para o novo",
			'parser' => array(
				'options' => array(
					'delete-original' => array('boolean' => true, 'default' => false)
				)
			)
		));

		$parser->addSubcommand('enrollments', array(
			'help' => "Migra as natrículas do site antigo para o novo",
			'parser' => array(
				'options' => array(
					'delete-original' => array('boolean' => true, 'default' => false)
				)
			)
		));

		return $parser;
	}

	public function students() {
		// Deleta os usuários originais?
		if ($this->params['delete-original']) {
			$conditions = array('User.group_id' => Group::ALUNOS);

			$count = $this->User->find('count', array('conditions' => $conditions));

			$this->out('<info>Deleting original students...</info>');
			if ($this->User->deleteAll($conditions)) {
				$this->out(sprintf("- <warning>%d students deleted</warning>", $count));
			}
		}

		$this->out('<info>Searching for old students...</info>');

		$OldUsers = $this->OldUser->find('all');
		$oldCount = count($OldUsers);

		$this->out(sprintf('- <comment>%d students found on the old database</comment>', $oldCount));

		$createdCount = 0;
		foreach ($OldUsers as $OldUser) {
			$OldUser = $OldUser['OldUser'];

			$data = array(
				'id' => (int)$OldUser['id'],
				'name' => trim($OldUser['name']),
				'surname' => trim($OldUser['surname']),
				'email' => trim($OldUser['email']),
				'password' => trim($OldUser['password']),

				'group_id' => Group::ALUNOS,
				'status_id' => $this->_convertUserStatusId((int)$OldUser['status_id']),

				'created' => $OldUser['created'],
				'modified' => $OldUser['updated'],
			);

			$this->User->create();
			if ($this->User->save($data, array('callbacks' => false))) {
				$createdCount++;

				if (!($createdCount % 25) || ($createdCount == $oldCount)) {
					$this->out(sprintf('- <info>%d of %d students created/updated</info>', $createdCount, $oldCount));
				}
			}
		}
	}

	public function courses() {
		// Deleta as turmas originais?
		if ($this->params['delete-original']) {
			$conditions = array(true => true);

			$count = $this->Course->find('count', array('conditions' => $conditions));

			$this->out('<info>Deleting original courses...</info>');
			if ($this->Course->deleteAll($conditions)) {
				$this->out(sprintf("- <warning>%d courses deleted</warning>", $count));
			}
		}

		$this->out('<info>Searching for old courses...</info>');

		$OldCourses = $this->OldCourse->find('all');
		$oldCount = count($OldCourses);

		$this->out(sprintf('- <comment>%d courses found on the old database</comment>', $oldCount));

		$createdCount = 0;
		foreach ($OldCourses as $OldCourse) {
			$OldCourse = $OldCourse['OldCourse'];

			if (empty($OldCourse['description'])) {
				$OldCourse['description'] = $OldCourse['title'];
			}

			$data = array(
				'id' => (int)$OldCourse['id'],
				'code' => trim($OldCourse['code']),
				'name' => trim($OldCourse['title']),
				'description' => trim($OldCourse['description']),

				'price' => (float)$OldCourse['price'],

				'start' => $OldCourse['start'],
				'end' => $OldCourse['end'],

				'advanced' => preg_match('/Avançado/', $OldCourse['title']),
				'status_id' => $this->_convertCourseStatusId((int)$OldCourse['status_id']),

				'created' => $OldCourse['created'],
				'modified' => $OldCourse['updated']
			);

			$this->Course->create();
			if ($this->Course->save($data)) {
				$createdCount++;

				if (!($createdCount % 25) || ($createdCount == $oldCount)) {
					$this->out(sprintf('- <info>%d of %d courses created</info>', $createdCount, $oldCount));
				}
			}
		}
	}

	public function enrollments() {
		// Deleta as turmas originais?
		if ($this->params['delete-original']) {
			$conditions = array(true => true);

			$count = $this->Enrollment->find('count', array('conditions' => $conditions));

			$this->out('<info>Deleting original enrollments...</info>');
			if ($this->Enrollment->deleteAll($conditions)) {
				$this->out(sprintf("- <warning>%d enrollments deleted</warning>", $count));
			}
		}

		$this->out('<info>Searching for old enrollments...</info>');

		$OldEnrollments = $this->OldEnrollment->find('all');
		$oldCount = count($OldEnrollments);

		$this->out(sprintf('- <comment>%d enrollments found on the old database</comment>', $oldCount));

		$createdCount = 0;
		foreach ($OldEnrollments as $OldEnrollment) {
			$OldEnrollment = $OldEnrollment['OldEnrollment'];

			$data = array(
				'user_id' => (int)$OldEnrollment['student_id'],
				'course_id' => (int)$OldEnrollment['class_id'],
				'status_id' => Status::MATRICULA_CONFIRMADA
			);

			$this->Enrollment->create();
			if ($this->Enrollment->save($data)) {
				$createdCount++;

				if (!($createdCount % 25) || ($createdCount == $oldCount)) {
					$this->out(sprintf('- <info>%d of %d enrollments created</info>', $createdCount, $oldCount));
				}
			}
		}
	}

	protected function _convertUserStatusId($status) {
		switch ($status) {
			case 8:
			default:
				return Status::ALUNO_PENDENTE;

			case 9:
				return Status::ALUNO_CONFIRMADO;

			case 10:
				return Status::ALUNO_DELETADO;
		}
	}

	protected function _convertCourseStatusId($status) {
		switch ($status) {
			case 5:
				return Status::INSCRICOES_ABERTAS;

			case 4:
			case 6:
			case 7:
			default:
				return Status::INSCRICOES_FECHADAS;
		}
	}

}