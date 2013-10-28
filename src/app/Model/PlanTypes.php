<?php
class PlanTypes extends AppModel {
  public $name='PlanTypes';
  public $useTable='plan_types';
  public $primaryKey='plan_type_id';
  
  public $validate = array(
      'short_desc' => array(
          'plan_types_short_desc_rule1' => array(
              'rule' => 'notEmpty',
              'message' => 'Plan short description is required.'
          )
      )
  );
} ?>