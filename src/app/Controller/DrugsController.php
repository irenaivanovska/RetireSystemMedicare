<?php
class DrugsController extends AppController {
  public $name = 'Drugs';
  public $useTable = 'drugs';
  public $helpers = array('Html','Form');
  
  public $components = array('Paginator');
  
  public $paginate = array(
      //'fields' => array('Post.id', 'Post.created'),
      'limit' => 15,
      'order' => array(
          'Drugs.drug_name' => 'asc'
      )
  );
  
  public function __construct($request = null, $response = null) {
    parent::__construct($request, $response);
    $this->loadModel('Drugs');
  }
  
  public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('enterDrugs', 'findDrugs', 'showDrugsByCountyAndZip', 'showDetail');
  }
  
  public function enterDrugs() {
    
  }
  
  public function findDrugs() {
    
  }
  
  public function showDrugsByCountyAndZip() {
    //$this->Paginator->settings = $this->paginate;
    $data =& $this->request->data;
    if (!isset($data['Drugs'])) {
      return;
    }
    $drug =& $data['Drugs'];
    if (isset($drug['options']) && $drug['options'] != '1') {
      return $this->redirect(array('controller' => 'zip_finds', 'action' => 'showPlansByZipAndCounty'));
    }
    $zip_code = $drug['zip_code'];
    $county_name = $drug['county_name'];
    $filter_by_drug_name = $drug['drug_name'];
    
    $page = 1;
    $limit = 15;
    $this->Paginator->settings = array(
        'page' => $page,
        'limit' => $limit,
        'pageCount' => $limit
    );
    
    $this->Drugs->recursive = 0;
    $drugs_list = $this->Drugs->find('all', array(
        'fields' => array('Drugs.drug_id', 'Drugs.drug_name', 'Drugs.dose', 'Drugs.frequency'),
        'conditions' => array('Drugs.drug_name LIKE' => $filter_by_drug_name . '%'),
    ));
    
    $this->set('filter_by_drug_name', $filter_by_drug_name);
    $this->set('zip_code', $zip_code);
    $this->set('county_name', $county_name);
    $this->set('drugs_list', $drugs_list);
  }
  
  public function showDetail() {
    $params = $this->params['pass'];
    
    $drug_id = $params[0];
    
    $this->Drugs->recursive = 0;
    $drug_item = $this->Drugs->find('all', array(
        'fields' => array('Drugs.drug_id', 'Drugs.drug_name', 'Drugs.dose', 'Drugs.frequency'),
        'conditions' => array('Drugs.drug_id' =>  $drug_id),
        //'page' => $page,
        //o'limit' => $limit
    ));
    
    $this->set('drug_item', $drug_item);
  }
  
}