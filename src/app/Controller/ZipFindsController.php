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
    $isAjax = ($this->request->is('ajax')) ? true : false;
    if ($isAjax) {
      $this->layout = 'ajax';
    }
    $this->ZipFind->recursive = 0;
    $zipFinds = $this->ZipFind->find('all', array(
        'fields' => array('DISTINCT(ZipFind.county_name)','zip','zip_code','state_name'),
        'conditions' => array('ZipFind.zip_code' => $this->request->data['ZipFind']['query']))
    );
    $this->set('zipFinds',$zipFinds);
  }
  
  public function showPlansByZipAndCounty() {
    $isAjax = ($this->request->is('ajax')) ? true : false;
    if ($isAjax) {
      $this->layout = 'ajax';
    }
    $this->ZipFind->recursive = 0;
    $planFinds = $this->ZipFind->find('all', array(
        'fields' => array('ZipFind.county_name','zip','zip_code','state_name', 'name', 'web_addr', 'textcond', 'description'),
        'conditions' => array('ZipFind.zip_code' => $this->request->data['ZipFind']['query']))
    );
    $this->set('planFinds',$planFinds);
  }
  

  function search() {


  }
  
  public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('view', 'index', 'search', 'showPlansByZipAndCounty');
  }

}

?>