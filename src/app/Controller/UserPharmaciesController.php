<?php
App::uses('AppController', 'Controller');
/**
 * UserPharmacies Controller
 *
 * @property UserPharmacy $UserPharmacy
 * @property PaginatorComponent $Paginator
 */
class UserPharmaciesController extends AppController {

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
		$this->UserPharmacy->recursive = 0;
		$this->set('userPharmacies', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->UserPharmacy->exists($id)) {
			throw new NotFoundException(__('Invalid user pharmacy'));
		}
		$options = array('conditions' => array('UserPharmacy.' . $this->UserPharmacy->primaryKey => $id));
		$this->set('userPharmacy', $this->UserPharmacy->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->UserPharmacy->create();
			if ($this->UserPharmacy->save($this->request->data)) {
				$this->Session->setFlash(__('The user pharmacy has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user pharmacy could not be saved. Please, try again.'));
			}
		}
		$users = $this->UserPharmacy->User->find('list');
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
		if (!$this->UserPharmacy->exists($id)) {
			throw new NotFoundException(__('Invalid user pharmacy'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UserPharmacy->save($this->request->data)) {
				$this->Session->setFlash(__('The user pharmacy has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user pharmacy could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UserPharmacy.' . $this->UserPharmacy->primaryKey => $id));
			$this->request->data = $this->UserPharmacy->find('first', $options);
		}
		$users = $this->UserPharmacy->User->find('list');
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
		$this->UserPharmacy->id = $id;
		if (!$this->UserPharmacy->exists()) {
			throw new NotFoundException(__('Invalid user pharmacy'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UserPharmacy->delete()) {
			$this->Session->setFlash(__('The user pharmacy has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user pharmacy could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
