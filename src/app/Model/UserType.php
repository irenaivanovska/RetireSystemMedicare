<?php
App::uses('AppModel', 'Model');
class UserType extends AppModel {

	public $primaryKey = 'user_type_id';
    public $useTable = 'user_types';
    public $name = 'UserType';

    
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_type_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
