<?php

class ReportsController extends AppController {

    public $helpers = array ('Html','Form');
	public $name = 'Reports';
    public $uses = array(
    	'Reports',
    	'Users'
	);
	
	public function index() {
	
		if ($this->Auth->user()) {
			$user=$this->Auth->user();
			$user_id = $user['user_id'];
			$role = $user['role'];
			
			$this->set('user_id', $user_id);
			$this->set('role', $role);
			
			if($role!='admin') { $this->redirect(array('controller'=>'account', 'action' =>'index')); }
		
			$this->set('title_for_layout', 'Admin Reports');
			
		} else { $this->redirect('/');  } 
		
	}

}

?>