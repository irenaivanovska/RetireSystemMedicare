<?php

App::uses('AuthComponent', 'Controller/Component');
App::uses('CakeEmail', 'Network/Email');

class Users extends AppModel {
    public $name = 'Users';
	public $useTable = 'users';
    public $primaryKey = 'user_id';
	
	public $_schema = array(
		'user_id'=>array('type' => 'integer','key' => 'primary'),
		'user_firstname'=>array('type' => 'string'),
		'user_lastname'=>array('type' => 'string'),
		'user_email_address'=>array('type' => 'string'),
		'user_active'=>array('type' => 'integer'),
		'created'=>array('type' => 'date'),
		'username'=>array('type' => 'string'),
		'password'=>array('type' => 'string'),
		'role'=>array('type' => 'string'), // admin, transport, member
		'step'=>array('type' => 'integer'), // step of registration
		'terms'=>array('type' => 'integer'),
	);
	
	// thumb_photo_url,full_photo_url, 
	
	
 
 	public $validate = array(
		'username' => array(
			'Username must be between 5 and 15 characters.' => array(
				'rule' => array('between', 5, 15), 
				'message' => 'Your username must be between 5 and 15 characters.'
			),
			'That username has already been taken' => array(
				'rule' => 'isUnique', 
				'message' => 'That username has already been taken'
			)
		),	
		'password' => array(
			'Password filed must not be empty.' => array(
				'rule' => 'notEmpty', 
				'message' => 'Please enter your Password.'
			), 
			'Match passwords' => array(
				'rule' => 'matchPasswords', 
				'message' => 'Your passwords do not match'
			)
		), 
		'terms' => array(
				'rule' => 'notEmpty', 
				'message' => 'You must agree to the terms.'),
		'user_firstname' => array('rule' => 'notEmpty'), 
      	'user_lastname' => array('rule' => 'notEmpty'),
      	'email' => array('rule' => 'notEmpty'),
		'password_confirmation' => array(
			'Password confirmation filed must not be empty.' => array(
				'rule' => 'notEmpty', 
				'message' => 'Please re-enter your Password.'
			)
		)	
	);
	
	public function matchPasswords($data) {
		
		if ($data['password'] == $this->data['Users']['password_confirmation']) {
			return true;
		}
			$this->invalidate('password_confirmation', 'Your passwords do not match');
			return false;
	}
	
	
	/* Hash the password before saving in the database. */

		public function beforeSave() {
		
		if(isset($this->data['Users']['password'])) {
			
			$this->data['Users']['password'] = AuthComponent::password($this->data['Users']['password']);
			
		} 
			return true;
		
	} 
		
	       
} /* end class  */

?>