<?php
App::uses('AppController', 'Controller');
/**
 * UserSecretQuestions Controller
 *
 * @property UserSecretQuestion $UserSecretQuestion
 * @property PaginatorComponent $Paginator
 */
class UserSecretQuestionsController extends AppController {

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
		$this->UserSecretQuestion->recursive = 0;
		$this->set('userSecretQuestions', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->UserSecretQuestion->exists($id)) {
			throw new NotFoundException(__('Invalid user secret question'));
		}
		$options = array('conditions' => array('UserSecretQuestion.' . $this->UserSecretQuestion->primaryKey => $id));
		$this->set('userSecretQuestion', $this->UserSecretQuestion->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->UserSecretQuestion->create();
			if ($this->UserSecretQuestion->save($this->request->data)) {
				$this->Session->setFlash(__('The user secret question has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user secret question could not be saved. Please, try again.'));
			}
		}
		$users = $this->UserSecretQuestion->User->find('list');
		$secretQuestionsSecretQuestions = $this->UserSecretQuestion->SecretQuestionsSecretQuestion->find('list');
		$this->set(compact('users', 'secretQuestionsSecretQuestions'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->UserSecretQuestion->exists($id)) {
			throw new NotFoundException(__('Invalid user secret question'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UserSecretQuestion->save($this->request->data)) {
				$this->Session->setFlash(__('The user secret question has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user secret question could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UserSecretQuestion.' . $this->UserSecretQuestion->primaryKey => $id));
			$this->request->data = $this->UserSecretQuestion->find('first', $options);
		}
		$users = $this->UserSecretQuestion->User->find('list');
		$secretQuestionsSecretQuestions = $this->UserSecretQuestion->SecretQuestionsSecretQuestion->find('list');
		$this->set(compact('users', 'secretQuestionsSecretQuestions'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->UserSecretQuestion->id = $id;
		if (!$this->UserSecretQuestion->exists()) {
			throw new NotFoundException(__('Invalid user secret question'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UserSecretQuestion->delete()) {
			$this->Session->setFlash(__('The user secret question has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user secret question could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
