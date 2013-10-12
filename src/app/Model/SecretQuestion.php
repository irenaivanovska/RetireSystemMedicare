<?php
App::uses('AppModel', 'Model');

class SecretQuestion extends AppModel {

    public $primaryKey = 'secret_question_id';
    
    public $name = 'SecretQuestion';
    public $useTable = 'secret_questions'; 
    
}
