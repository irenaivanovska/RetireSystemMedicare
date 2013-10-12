<?php

class AccountController extends AppController {

    public $helpers = array ('Html','Form');
	public $name = 'Account';
    public $uses = array(
    	'Account',
    	'Users'
	);
	
	public function beforeRender() {
		
		$this->set('top_left','account');
		$this->set('left_bar','account');
		
	}
	
	
	public function index() {
	
		if ($this->Auth->user()) {
			$user=$this->Auth->user();
			$user_id = $user['user_id'];
			$role = $user['role'];
			
			$step=$user['step'];
			$userInfo=$this->Users->find('first', array('conditions' => array('user_id' => $user_id)));
			
			$this->set('userInfo',$userInfo);
			
			$this->set('user_id', $user_id);
			$this->set('role', $role);
		
			$this->set('title_for_layout', 'My Account');
			
		} else { $this->redirect('/');  } 
		
	}

}

?>