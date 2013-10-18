<?php
class FavoriteDrugs extends AppModel {
  public $name='FavoriteDrugs';
  public $useTable='favorite_drugs';
  public $primaryKey=array('user_id', 'drug_id');
  
  public $validate = array(
      'user_id' => array(
          'favorite_drugs_rule1' => array(
              'rule' => 'notEmpty',
              'message' => 'User is required.'
          )
      ),
      'drug_id' => array(
          'favorite_drugs_rule1' => array(
              'rule' => 'notEmpty',
              'message' => 'Drug is required.'
          )
      )
  );
  
  public $belongsTo = array(
      'Users' => array(
          'className' => 'User',
          'foreignKey' => 'user_id',
          'conditions' => '',
          'fields' => '',
          'order' => ''
      ),
      'Drugs' => array(
          'className' => 'Drugs',
          'foreignKey' => 'drug_id',
          'conditions' => '',
          'fields' => '',
          'order' => ''
      )
  );
} ?>