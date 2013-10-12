<?php
App::uses('AppModel', 'Model');
class UserDruglist extends AppModel {

	public $primaryKey = 'user_druglist_id';
    public $name = 'UserDruglist';
    public $useTable = 'user_druglists'; 


/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
