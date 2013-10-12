<?php
App::uses('AppModel', 'Model');
class PhoneType extends AppModel {

	public $primaryKey = 'phone_type_id';
    public $name = 'PhoneType';
    public $useTable = 'phone_type';

}
