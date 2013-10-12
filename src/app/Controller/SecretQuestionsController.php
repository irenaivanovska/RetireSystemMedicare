<?php
App::uses('AppController', 'Controller');
/**
 * SecretQuestions Controller
 *
 * @property SecretQuestion $SecretQuestion
 * @property PaginatorComponent $Paginator
 */
class SecretQuestionsController extends AppController {

/**
 * Helpers
 *
 * @var array
 */

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
    
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }
    

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SecretQuestion->recursive = 0;
		$this->set('secretQuestions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SecretQuestion->exists($id)) {
			throw new NotFoundException(__('Invalid secret question'));
		}
		$options = array('conditions' => array('SecretQuestion.' . $this->SecretQuestion->primaryKey => $id));
		$this->set('secretQuestion', $this->SecretQuestion->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SecretQuestion->create();
			if ($this->SecretQuestion->save($this->request->data)) {
				$this->Session->setFlash(__('The secret question has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The secret question could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->SecretQuestion->exists($id)) {
			throw new NotFoundException(__('Invalid secret question'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SecretQuestion->save($this->request->data)) {
				$this->Session->setFlash(__('The secret question has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The secret question could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SecretQuestion.' . $this->SecretQuestion->primaryKey => $id));
			$this->request->data = $this->SecretQuestion->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->SecretQuestion->id = $id;
		if (!$this->SecretQuestion->exists()) {
			throw new NotFoundException(__('Invalid secret question'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SecretQuestion->delete()) {
			$this->Session->setFlash(__('The secret question has been deleted.'));
		} else {
			$this->Session->setFlash(__('The secret question could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
