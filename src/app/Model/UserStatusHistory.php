<?php
App::uses('AppModel', 'Model');
class UserStatusHistory extends AppModel {

	public $useTable = 'user_status_history';
    public $primaryKey = 'user_status_history_id';
    public $name = 'UserStatusHistory';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

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
