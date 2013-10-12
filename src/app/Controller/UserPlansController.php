<?php
App::uses('AppController', 'Controller');
/**
 * UserPlans Controller
 *
 * @property UserPlan $UserPlan
 * @property PaginatorComponent $Paginator
 */
class UserPlansController extends AppController {

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
		$this->UserPlan->recursive = 0;
		$this->set('userPlans', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->UserPlan->exists($id)) {
			throw new NotFoundException(__('Invalid user plan'));
		}
		$options = array('conditions' => array('UserPlan.' . $this->UserPlan->primaryKey => $id));
		$this->set('userPlan', $this->UserPlan->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->UserPlan->create();
			if ($this->UserPlan->save($this->request->data)) {
				$this->Session->setFlash(__('The user plan has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user plan could not be saved. Please, try again.'));
			}
		}
		$plans = $this->UserPlan->Plan->find('list');
		$users = $this->UserPlan->User->find('list');
		$this->set(compact('plans', 'users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->UserPlan->exists($id)) {
			throw new NotFoundException(__('Invalid user plan'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UserPlan->save($this->request->data)) {
				$this->Session->setFlash(__('The user plan has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user plan could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UserPlan.' . $this->UserPlan->primaryKey => $id));
			$this->request->data = $this->UserPlan->find('first', $options);
		}
		$plans = $this->UserPlan->Plan->find('list');
		$users = $this->UserPlan->User->find('list');
		$this->set(compact('plans', 'users'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->UserPlan->id = $id;
		if (!$this->UserPlan->exists()) {
			throw new NotFoundException(__('Invalid user plan'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UserPlan->delete()) {
			$this->Session->setFlash(__('The user plan has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user plan could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
