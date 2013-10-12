<?php
App::uses('AppModel', 'Model');
class UserSecretQuestion extends AppModel {

	public $primaryKey = 'user_secret_question_id';
    public $name = 'UserSecretQuestion';
    public $useTable = 'user_secret_questions';


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
		),
		'SecretQuestionsSecretQuestion' => array(
			'className' => 'SecretQuestionsSecretQuestion',
			'foreignKey' => 'secret_questions_secret_question_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
