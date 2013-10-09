<?php
class ZipFindsController extends AppController{
  public $name = 'ZipFinds';
  public $useTable = 'vwplansbyzipnew_local';
  public $helpers = array('Html','Form');

  public function index(){
    if (!empty($this->data)) {
      $this->redirect(array('controller'=>'ZipFinds','action'=>'view', urlencode($this->data['query'])));
    }
  }
  
  public function view(){
    $this->ZipFind->recursive = 0;
    $zipFinds = $this->ZipFind->find('all', array(
        'fields' => array('DISTINCT(ZipFind.county_name)','zip','zip_code','state_name'),
        'conditions' => array('ZipFind.zip_code' => $this->request->data['ZipFind']['query']))
    );
    $this -> set('zipFinds',$zipFinds);
  }

  function search() {


  }

}

?>