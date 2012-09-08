<?php
App::uses('AppController', 'Controller');
/**
 * Courses Controller
 *
 * @property Course $Course
 */
class CoursesController extends AppController {

/**
 * Retorna o próximo curso (inscrições abertas) ou o útlimo (inscrições fechadas)
 *
 * @throws MethodNotAllowedException If the request isn't a POST
 *
 * @return array
 */
	public function nextCourse($advanced = false) {
		if (!isset($this->request->params['requested'])) {
			throw new MethodNotAllowedException();
		}

		return $this->Course->findNextCourse($advanced);
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Course->recursive = 0;

		$params = array();

		// Requested
		if ($this->params->requested) {
			return $this->Course->find('all', $params);
		}

		$this->paginate = $params;
		$this->set('courses', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 *
 * @throws NotFoundException If the course doesn't exist
 *
 * @return void
 */
	public function admin_view($id = null) {
		$this->Course->id = $id;
		if (!$this->Course->exists()) {
			throw new NotFoundException(__('Invalid %s', __('course')));
		}
		$this->set('course', $this->Course->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Course->create();
			if ($this->Course->save($this->request->data)) {
				$this->Session->setFlash(
					__('The %s has been saved', __('course')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(
					__('The %s could not be saved. Please, try again.', __('course')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
			}
		}
		$statuses = $this->Course->Status->find('list');
		$this->set(compact('statuses'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 *
 * @throws NotFoundException If the course doesn't exist
 *
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Course->id = $id;
		if (!$this->Course->exists()) {
			throw new NotFoundException(__('Invalid %s', __('course')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Course->save($this->request->data)) {
				$this->Session->setFlash(
					__('The %s has been saved', __('course')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(
					__('The %s could not be saved. Please, try again.', __('course')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
			}
		} else {
			$this->request->data = $this->Course->read(null, $id);
		}
		$statuses = $this->Course->Status->find('list');
		$this->set(compact('statuses'));
	}

/**
 * admin_delete method
 *
 * @param string $id
 *
 * @throws MethodNotAllowedException If the request isn't a POST
 * @throws NotFoundException If the course doesn't exist
 *
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Course->id = $id;
		if (!$this->Course->exists()) {
			throw new NotFoundException(__('Invalid %s', __('course')));
		}
		if ($this->Course->delete()) {
			$this->Session->setFlash(
				__('The %s deleted', __('course')),
				'alert',
				array(
					'plugin' => 'TwitterBootstrap',
					'class' => 'alert-success'
				)
			);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(
			__('The %s was not deleted', __('course')),
			'alert',
			array(
				'plugin' => 'TwitterBootstrap',
				'class' => 'alert-error'
			)
		);
		$this->redirect(array('action' => 'index'));
	}
}
