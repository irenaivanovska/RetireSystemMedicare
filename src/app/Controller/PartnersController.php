<?php
App::uses('AppController', 'Controller');
/**
 * Partners Controller
 *
 * @property Partner $Partner
 * @property PaginatorComponent $Paginator
 */
class PartnersController extends AppController {

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
		$this->Partner->recursive = 0;
		$this->set('partners', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Partner->exists($id)) {
			throw new NotFoundException(__('Invalid partner'));
		}
		$options = array('conditions' => array('Partner.' . $this->Partner->primaryKey => $id));
		$this->set('partner', $this->Partner->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Partner->create();
			if ($this->Partner->save($this->request->data)) {
				$this->Session->setFlash(__('The partner has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The partner could not be saved. Please, try again.'));
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
		if (!$this->Partner->exists($id)) {
			throw new NotFoundException(__('Invalid partner'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Partner->save($this->request->data)) {
				$this->Session->setFlash(__('The partner has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The partner could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Partner.' . $this->Partner->primaryKey => $id));
			$this->request->data = $this->Partner->find('first', $options);
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
		$this->Partner->id = $id;
		if (!$this->Partner->exists()) {
			throw new NotFoundException(__('Invalid partner'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Partner->delete()) {
			$this->Session->setFlash(__('The partner has been deleted.'));
		} else {
			$this->Session->setFlash(__('The partner could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
