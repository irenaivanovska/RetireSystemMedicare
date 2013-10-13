<?php
class Drugs extends AppModel {
  public $name='Drugs';
  public $useTable='drugs';
  public $primaryKey='drug_id';
  
  public $validate = array(
      'drug_name' => array(
          'drug_name_rule1' => array(
              'rule' => 'notEmpty',
              'message' => 'Drug name is required.'
          ),
          'Drug drug_name_rule2' => array(
              'rule' => 'isUnique',
              'message' => 'Drug name already exists.'
          )
      )
  );
  
  public $belongsTo = array(
      'PharmacyType' => array(
          'className' => 'PharmacyType',
          'foreignKey' => 'user_type_id',
          'conditions' => '',
          'fields' => '',
          'order' => ''
      ),
  );
}