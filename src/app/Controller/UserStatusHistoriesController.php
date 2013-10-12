<?php
App::uses('AppController', 'Controller');
/**
 * UserStatusHistories Controller
 *
 * @property UserStatusHistory $UserStatusHistory
 * @property PaginatorComponent $Paginator
 */
class UserStatusHistoriesController extends AppController {

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
		$this->UserStatusHistory->recursive = 0;
		$this->set('userStatusHistories', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->UserStatusHistory->exists($id)) {
			throw new NotFoundException(__('Invalid user status history'));
		}
		$options = array('conditions' => array('UserStatusHistory.' . $this->UserStatusHistory->primaryKey => $id));
		$this->set('userStatusHistory', $this->UserStatusHistory->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->UserStatusHistory->create();
			if ($this->UserStatusHistory->save($this->request->data)) {
				$this->Session->setFlash(__('The user status history has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user status history could not be saved. Please, try again.'));
			}
		}
		$users = $this->UserStatusHistory->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->UserStatusHistory->exists($id)) {
			throw new NotFoundException(__('Invalid user status history'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UserStatusHistory->save($this->request->data)) {
				$this->Session->setFlash(__('The user status history has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user status history could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UserStatusHistory.' . $this->UserStatusHistory->primaryKey => $id));
			$this->request->data = $this->UserStatusHistory->find('first', $options);
		}
		$users = $this->UserStatusHistory->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->UserStatusHistory->id = $id;
		if (!$this->UserStatusHistory->exists()) {
			throw new NotFoundException(__('Invalid user status history'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UserStatusHistory->delete()) {
			$this->Session->setFlash(__('The user status history has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user status history could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
