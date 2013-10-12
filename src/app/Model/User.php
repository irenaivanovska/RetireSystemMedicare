<?php
App::uses('AppModel', 'Model');

class User extends AppModel {

    public $primaryKey = 'user_id';
    public $name = 'Users';
    public $useTable = 'users';
    public $_schema = array(
        'user_id' => array('type' => 'integer', 'key' => 'primary'),
        'user_firstname' => array('type' => 'string'),
        'user_lastname' => array('type' => 'string'),
        'user_email_address' => array('type' => 'string'),
        'user_active' => array('type' => 'integer'),
        'created' => array('type' => 'date'),
        'username' => array('type' => 'string'),
        'password' => array('type' => 'string'),
        'role' => array('type' => 'string'), // admin, member, etc.
        'step' => array('type' => 'integer'), // step of registration process (if "steps" are required)
    );
    
    public $validate = array(
		'username' => array(
			'characters.' => array(
				'rule' => 'notEmpty', 
				'message' => 'Your username can not be blank.'
			),
            'email' => array(
                'rule'  => 'email'
            ),
			'taken' => array(
				'rule' => 'isUnique', 
				'message' => 'That username has already been taken'
			)
		),	
		'password' => array(
			'Password filed must not be empty.' => array(
				'rule' => 'notEmpty', 
				'message' => 'Please enter your Password.'
			), 
		), 
		
	);
    

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'UserType' => array(
            'className' => 'UserType',
            'foreignKey' => 'user_type_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'PrimaryPhoneType' => array(
            'className' => 'PhoneType',
            'foreignKey' => 'primary_phone_type_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'SecondaryPhoneType' => array(
            'className' => 'PhoneType',
            'foreignKey' => 'secondary_phone_type_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'UserDruglist' => array(
            'className' => 'UserDruglist',
            'foreignKey' => 'user_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'UserPharmacy' => array(
            'className' => 'UserPharmacy',
            'foreignKey' => 'user_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'UserPlan' => array(
            'className' => 'UserPlan',
            'foreignKey' => 'user_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'UserSecretQuestion' => array(
            'className' => 'UserSecretQuestion',
            'foreignKey' => 'user_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'UserStatusHistory' => array(
            'className' => 'UserStatusHistory',
            'foreignKey' => 'user_id',
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
