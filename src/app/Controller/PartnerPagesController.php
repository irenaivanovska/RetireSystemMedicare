<?php
App::uses('AppController', 'Controller');
/**
 * PartnerPages Controller
 *
 * @property PartnerPage $PartnerPage
 * @property PaginatorComponent $Paginator
 */
class PartnerPagesController extends AppController {

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
		$this->PartnerPage->recursive = 0;
		$this->set('partnerPages', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->PartnerPage->exists($id)) {
			throw new NotFoundException(__('Invalid partner page'));
		}
		$options = array('conditions' => array('PartnerPage.' . $this->PartnerPage->primaryKey => $id));
		$this->set('partnerPage', $this->PartnerPage->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->PartnerPage->create();
			if ($this->PartnerPage->save($this->request->data)) {
				$this->Session->setFlash(__('The partner page has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The partner page could not be saved. Please, try again.'));
			}
		}
		$partners = $this->PartnerPage->Partner->find('list');
		$this->set(compact('partners'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->PartnerPage->exists($id)) {
			throw new NotFoundException(__('Invalid partner page'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PartnerPage->save($this->request->data)) {
				$this->Session->setFlash(__('The partner page has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The partner page could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PartnerPage.' . $this->PartnerPage->primaryKey => $id));
			$this->request->data = $this->PartnerPage->find('first', $options);
		}
		$partners = $this->PartnerPage->Partner->find('list');
		$this->set(compact('partners'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->PartnerPage->id = $id;
		if (!$this->PartnerPage->exists()) {
			throw new NotFoundException(__('Invalid partner page'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PartnerPage->delete()) {
			$this->Session->setFlash(__('The partner page has been deleted.'));
		} else {
			$this->Session->setFlash(__('The partner page could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
