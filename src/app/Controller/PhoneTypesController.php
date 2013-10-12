<?php
App::uses('AppController', 'Controller');
/**
 * PhoneTypes Controller
 *
 * @property PhoneType $PhoneType
 * @property PaginatorComponent $Paginator
 */
class PhoneTypesController extends AppController {

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
		$this->PhoneType->recursive = 0;
		$this->set('phoneTypes', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->PhoneType->exists($id)) {
			throw new NotFoundException(__('Invalid phone type'));
		}
		$options = array('conditions' => array('PhoneType.' . $this->PhoneType->primaryKey => $id));
		$this->set('phoneType', $this->PhoneType->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->PhoneType->create();
			if ($this->PhoneType->save($this->request->data)) {
				$this->Session->setFlash(__('The phone type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The phone type could not be saved. Please, try again.'));
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
		if (!$this->PhoneType->exists($id)) {
			throw new NotFoundException(__('Invalid phone type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PhoneType->save($this->request->data)) {
				$this->Session->setFlash(__('The phone type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The phone type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PhoneType.' . $this->PhoneType->primaryKey => $id));
			$this->request->data = $this->PhoneType->find('first', $options);
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
		$this->PhoneType->id = $id;
		if (!$this->PhoneType->exists()) {
			throw new NotFoundException(__('Invalid phone type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PhoneType->delete()) {
			$this->Session->setFlash(__('The phone type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The phone type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
