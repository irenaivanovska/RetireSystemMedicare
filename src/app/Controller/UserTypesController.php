<?php
App::uses('AppController', 'Controller');
/**
 * UserTypes Controller
 *
 * @property UserType $UserType
 * @property PaginatorComponent $Paginator
 */
class UserTypesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->UserType->recursive = 0;
		$this->set('userTypes', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->UserType->exists($id)) {
			throw new NotFoundException(__('Invalid user type'));
		}
		$options = array('conditions' => array('UserType.' . $this->UserType->primaryKey => $id));
		$this->set('userType', $this->UserType->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->UserType->create();
			if ($this->UserType->save($this->request->data)) {
				$this->Session->setFlash(__('The user type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user type could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->UserType->exists($id)) {
			throw new NotFoundException(__('Invalid user type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UserType->save($this->request->data)) {
				$this->Session->setFlash(__('The user type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UserType.' . $this->UserType->primaryKey => $id));
			$this->request->data = $this->UserType->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->UserType->id = $id;
		if (!$this->UserType->exists()) {
			throw new NotFoundException(__('Invalid user type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UserType->delete()) {
			$this->Session->setFlash(__('The user type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
