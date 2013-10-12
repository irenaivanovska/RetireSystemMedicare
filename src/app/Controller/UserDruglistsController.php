<?php
App::uses('AppController', 'Controller');
/**
 * UserDruglists Controller
 *
 * @property UserDruglist $UserDruglist
 * @property PaginatorComponent $Paginator
 */
class UserDruglistsController extends AppController {

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
		$this->UserDruglist->recursive = 0;
		$this->set('userDruglists', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->UserDruglist->exists($id)) {
			throw new NotFoundException(__('Invalid user druglist'));
		}
		$options = array('conditions' => array('UserDruglist.' . $this->UserDruglist->primaryKey => $id));
		$this->set('userDruglist', $this->UserDruglist->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->UserDruglist->create();
			if ($this->UserDruglist->save($this->request->data)) {
				$this->Session->setFlash(__('The user druglist has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user druglist could not be saved. Please, try again.'));
			}
		}
		$users = $this->UserDruglist->User->find('list');
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
		if (!$this->UserDruglist->exists($id)) {
			throw new NotFoundException(__('Invalid user druglist'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UserDruglist->save($this->request->data)) {
				$this->Session->setFlash(__('The user druglist has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user druglist could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UserDruglist.' . $this->UserDruglist->primaryKey => $id));
			$this->request->data = $this->UserDruglist->find('first', $options);
		}
		$users = $this->UserDruglist->User->find('list');
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
		$this->UserDruglist->id = $id;
		if (!$this->UserDruglist->exists()) {
			throw new NotFoundException(__('Invalid user druglist'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UserDruglist->delete()) {
			$this->Session->setFlash(__('The user druglist has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user druglist could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
