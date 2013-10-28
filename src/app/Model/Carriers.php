<?php
class Carriers extends AppModel {
  public $name='Carriers';
  public $useTable='carriers';
  public $primaryKey='carriers_id';
  
  public $validate = array(
      'name' => array(
          'carrier_name_rule1' => array(
              'rule' => 'notEmpty',
              'message' => 'The name of carrier is required.'
          )
      )
  );
} ?>