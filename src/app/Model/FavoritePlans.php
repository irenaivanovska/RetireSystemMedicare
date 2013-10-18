<?php
class FavoritePlans extends AppModel {
  public $name='FavoritePlans';
  public $useTable='favorite_plans';
  public $primaryKey=array('user_id', 'plan_id');
  
  public $validate = array(
      'user_id' => array(
          'favorite_plans_rule1' => array(
              'rule' => 'notEmpty',
              'message' => 'User is required.'
          )
      ),
      'plan_id' => array(
          'favorite_plans_rule1' => array(
              'rule' => 'notEmpty',
              'message' => 'Plan is required.'
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
      'Plans' => array(
          'className' => 'Plans',
          'foreignKey' => 'plan_id',
          'conditions' => '',
          'fields' => '',
          'order' => ''
      )
  );
} ?>