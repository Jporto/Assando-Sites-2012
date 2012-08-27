<?php

App::uses('AppController', 'Controller');
App::uses('Status', 'Model');

/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

/**
 * Contador de alunos pendentes
 * 
 * @return int
 */
	public function admin_pendingStudents() {
		$params = array(
			'conditions' => array('User.status_id' => Status::ALUNO_PENDENTE)
		);

		return $this->User->findStudents('count', $params);
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$params = array(
			'contain' => array(
				'Group',
				'Enrollment' => array('Course')
			)
		);

		$title = 'Alunos';

		// Filter?
		if (isset($this->params->query['status'])) {
			$this->User->Status->id = (int)$this->params->query['status'];
			$Status = $this->User->Status->read();

			$params = Hash::merge(array(
				'conditions' => array('User.status_id' => $Status['Status']['id'])
			), $params);

			$title .= ' ' . strtolower(Inflector::pluralize($Status['Status']['name']));
		}

		// Post?
		if ($this->request->isPost()) {
			$search = $this->request->data['User']['search'];

			$params = Hash::merge(array(
				'conditions' => array(
					'OR' => array(
						'User.name LIKE' => '%' . $search . '%',
						'User.surname LIKE' => '%' . $search . '%',
						'User.email LIKE' => '%' . $search . '%'
					)
				)
			), $params);

			$title .= " - Busca por '{$search}'";
		}

		$this->paginate = $this->User->studentParams($params);
		$users = $this->paginate();

		if (empty($users)) {
			$this->Session->setFlash("Nenhum aluno encontrado", 'alert', array(
				'plugin' => 'TwitterBootstrap',
				'class' => 'alert-error'));
		}

		$this->set(array(
			'users' => $users,
			'title_for_layout' => $title
		));
	}

/**
 * admin_view method
 *
 * @param string $id
 * 
 * @throws NotFoundException If user doesn't exists
 * 
 * @return void
 */
	public function admin_view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->User->Group->find('list');
		$statuses = $this->User->Status->find('list');
		$this->set(compact('groups', 'statuses'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * 
 * @throws NotFoundException If user doesn't exists
 * 
 * @return void
 */
	public function admin_edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
		$groups = $this->User->Group->find('list');
		$statuses = $this->User->Status->find('list');
		$this->set(compact('groups', 'statuses'));
	}

/**
 * admin_delete method
 *
 * @param string $id
 * 
 * @throws MethodNotAllowedException If the request isn't a post
 * @throws NotFoundException If user doesn't exists
 * 
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
