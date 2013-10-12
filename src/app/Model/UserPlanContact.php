<?php
App::uses('AppModel', 'Model');
class UserPlanContact extends AppModel {

	public $primaryKey = 'user_plan_contact_id';
    public $name = 'UserPlanContact';
    public $useTable = 'user_plan_contacts';
    
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'UserPlan' => array(
			'className' => 'UserPlan',
			'foreignKey' => 'user_plan_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
