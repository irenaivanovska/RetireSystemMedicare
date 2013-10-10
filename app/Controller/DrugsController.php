<?php
class DrugsController extends AppController {
  public $name = 'Drugs';
  public $useTable = 'vwplandrugtiercost';
  public $helpers = array('Html','Form');
  
  public function __construct($request = null, $response = null) {
    parent::__construct($request, $response);
    $this->loadModel('DrugModel');
  }
  
  public function enterDrugs() {
    
  }
  
  public function findDrugs() {
    
  }
}