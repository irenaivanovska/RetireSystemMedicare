<?php
class DrugsController extends AppController {
  public $name = 'Drugs';
  public $useTable = 'drugs';
  public $helpers = array('Html','Form','Ace');
  
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
    $this->checkAjax();
    $this->Auth->allow('enterDrugs', 'findDrugs', 'showDrugsByCountyAndZip', 'showDetail');
  }
  
  public function enterDrugs() {
    
  }
  
  public function findDrugs() {
    $zip_code = '';
    $county_name = '';
    $filter_by_drug_name = '';
    $drugs_list = array();
    
    $data =& $this->request->data;
    $is_set_drugs = (isset($data['Drugs']) ? true : false);
    if ($is_set_drugs) {
      $drug =& $data['Drugs'];
      
      if (isset($drug['options']) && $drug['options'] != '1') {
        return $this->redirect(array('controller' => 'zip_finds', 'action' => 'showPlansByZipAndCounty'));
      }
      
      
      $zip_code = $drug['zip_code'];
      $county_name = $drug['county_name'];
      
      $filter_by_drug_name = (isset($drug['drug_name'])) ? trim($drug['drug_name']) : '';
      if ($filter_by_drug_name > '') {
        $page = 1;
        $limit = 15;
        $this->Paginator->settings = array(
            'page' => $page,
            'limit' => $limit,
            'pageCount' => $limit
        );
        
        $this->Drugs->recursive = 0;
        $drugs_list = $this->Drugs->find('all', array(
            'fields' => array('Drugs.drug_id', 'Drugs.drug_name', 'Drugs.dose', 'Drugs.frequency', 'Drugs.generic', 'Drugs.quantity'),
            'conditions' => array('Drugs.drug_name LIKE' => $filter_by_drug_name . '%'),
        ));
      }
    }
    
    $this->layout ='drugsLayout';
    
    $this->set('filter_by_drug_name', $filter_by_drug_name);
    $this->set('zip_code', $zip_code);
    $this->set('county_name', $county_name);
    $this->set('drugs_list', $drugs_list);
  }
  
  protected function checkAjax() {
    $isAjax = ($this->request->is('ajax')) ? true : false;
    if ($isAjax) {
      $this->layout = 'ajax';
    }
    return $isAjax;
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
