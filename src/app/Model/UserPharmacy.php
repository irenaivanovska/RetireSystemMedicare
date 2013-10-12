<?php
App::uses('AppModel', 'Model');
class UserPharmacy extends AppModel {

	public $primaryKey = 'user_pharmacy_id';
    public $name = 'UserPharmacy';
    public $useTable = 'user_pharmacies';
    

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