<?php

class Arl extends AppModel {
    public $name = 'Arl';
    public $useTable = 'actions_roles_lookup';
	public $primaryKey = 'arl_id';


	  public function getVisitorActions() {
		
		$visActions = $this->query("
						SELECT a.actions_name 
						FROM actions a, actions_roles_lookup arl, roles r 
						WHERE a.actions_id = arl.actions_id 
						AND r.roles_id = arl.roles_id 
						AND r.roles_name ='visitor' 
						");
						
						return $visActions;
	}
	
	
	public function getAdminActions() {
		
		$admActions = $this->query("
						SELECT a.actions_name 
						FROM actions a, actions_roles_lookup arl, roles r 
						WHERE a.actions_id = arl.actions_id 
						AND r.roles_id = arl.roles_id 
						AND r.roles_name ='visitor' 
						UNION
						SELECT a.actions_name 
						FROM actions a, actions_roles_lookup arl, roles r 
						WHERE a.actions_id = arl.actions_id 
						AND r.roles_id = arl.roles_id 
						AND r.roles_name = 'admin'
						UNION
						SELECT a.actions_name 
						FROM actions a, actions_roles_lookup arl, roles r 
						WHERE a.actions_id = arl.actions_id 
						AND r.roles_id = arl.roles_id 
						AND r.roles_name = 'member'
						");
						
						return $admActions;
	} 


 	public function getMemberActions() {
		
		$selActions = $this->query("
						SELECT a.actions_name 
						FROM actions a, actions_roles_lookup arl, roles r 
						WHERE a.actions_id = arl.actions_id 
						AND r.roles_id = arl.roles_id 
						AND r.roles_name ='visitor' 
						UNION
						SELECT a.actions_name 
						FROM actions a, actions_roles_lookup arl, roles r 
						WHERE a.actions_id = arl.actions_id 
						AND r.roles_id = arl.roles_id 
						AND r.roles_name = 'member'
						");
						
						return $selActions;
	} 
	
	


} // end class

?>