<?php
App::uses('AppController', 'Controller');
/**
 * UserPlanContacts Controller
 *
 * @property UserPlanContact $UserPlanContact
 * @property PaginatorComponent $Paginator
 */
class UserPlanContactsController extends AppController {

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
		$this->UserPlanContact->recursive = 0;
		$this->set('userPlanContacts', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->UserPlanContact->exists($id)) {
			throw new NotFoundException(__('Invalid user plan contact'));
		}
		$options = array('conditions' => array('UserPlanContact.' . $this->UserPlanContact->primaryKey => $id));
		$this->set('userPlanContact', $this->UserPlanContact->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->UserPlanContact->create();
			if ($this->UserPlanContact->save($this->request->data)) {
				$this->Session->setFlash(__('The user plan contact has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user plan contact could not be saved. Please, try again.'));
			}
		}
		$userPlans = $this->UserPlanContact->UserPlan->find('list');
		$this->set(compact('userPlans'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->UserPlanContact->exists($id)) {
			throw new NotFoundException(__('Invalid user plan contact'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UserPlanContact->save($this->request->data)) {
				$this->Session->setFlash(__('The user plan contact has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user plan contact could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UserPlanContact.' . $this->UserPlanContact->primaryKey => $id));
			$this->request->data = $this->UserPlanContact->find('first', $options);
		}
		$userPlans = $this->UserPlanContact->UserPlan->find('list');
		$this->set(compact('userPlans'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->UserPlanContact->id = $id;
		if (!$this->UserPlanContact->exists()) {
			throw new NotFoundException(__('Invalid user plan contact'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UserPlanContact->delete()) {
			$this->Session->setFlash(__('The user plan contact has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user plan contact could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
