<?php
class DrugsController extends AppController {
  public $name = 'Drugs';
  public $useTable = 'vwplandrugtiercost';
  public $helpers = array('Html','Form');
  
  public $components = array('Paginator');
  
  public $paginate = array(
      //'fields' => array('Post.id', 'Post.created'),
      'limit' => 15,
      'order' => array(
          'DrugModel.tier_label' => 'asc'
      )
  );
  
  public function __construct($request = null, $response = null) {
    parent::__construct($request, $response);
    $this->loadModel('DrugModel');
  }
  
  public function enterDrugs() {
    
  }
  
  public function findDrugs() {
    
  }
  
  public function showDrugsByCountyAndZip() {
    //$this->Paginator->settings = $this->paginate;
    $data =& $this->request->data;
    if (!isset($data['Drug'])) {
      return;
    }
    $drug =& $data['Drug'];
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
    
    $this->DrugModel->recursive = 0;
    $drugs_list = $this->DrugModel->find('all', array(
        'fields' => array('DrugModel.plan_id', 'DrugModel.contract_id', 'DrugModel.contract_year', 'DrugModel.tier_level', 'DrugModel.tier_label', 'DrugModel.tier_type_desc', 'DrugModel.cost_share_pref'),
        'conditions' => array('DrugModel.tier_label LIKE' => '%' . $filter_by_drug_name . '%'),
        'page' => $page,
        'limit' => $limit
    ));
    
    $this->set('filter_by_drug_name', $filter_by_drug_name);
    $this->set('zip_code', $zip_code);
    $this->set('county_name', $county_name);
    $this->set('drugs_list', $drugs_list);
  }
  
}