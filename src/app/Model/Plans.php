<?php
class Plans extends AppModel {
  public $name = 'Plans';
  public $useTable = 'plans'; //'vwplansbyzipnew_local';


  var $validate = array(
      'zip_code' => array(
          'rule' => array('minLength', 1)
      ),
      'body' => array(
          'rule' => array('minLength', 1)
      )
  );
}
?>