<?php

App::uses('AppController', 'Controller');

class PagesController extends AppController {

	public $uses = array();
	
	public function home() {
	
		$this->set('title_for_layout','Retiree Support Center');
		$this->layout='container';
	}
	
	public function two_col() {
		
		$this->set('title_for_layout','Retiree Support Center');
		
		
	}
	
	public function full() {
		
		$this->set('title_for_layout','Retiree Support Center');
		$this->layout='full';
		
	}
	
	public function about() {
		$this->layout='container';
	
	}
	
	public function contact() {
		
		
	
	}
	
	/*/
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}
	/*/
}
?>
