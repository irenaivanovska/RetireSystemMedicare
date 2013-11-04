<?php
class ZipFindsController extends AppController{
  public $name = 'ZipFinds';
  public $useTable = 'plans'; //'vwplansbyzipnew_local';
  public $helpers = array('Html','Form');
  public $components = array('Favorites');
  
  protected $filter_by_options = array(
    'montly_premium' => array (
        0 => '$0 (No premium)',
        1 => 'Under $50',
        2 => '$50-$100',
        3 => '$100-$200',
        4 => '$200 & Above' 
    ),
    'plan_type' => array(),
    'carrier' => array()
  );
  
  protected function loadFilterOptions() {
    $this->loadModel('PlanTypes');
    $this->loadModel('Carriers');
    
    $plan_types_data = $this->PlanTypes->find('all', array(
       'fields' => array('PlanTypes.plan_type_id', 'PlanTypes.short_desc'),
       'order' => array('PlanTypes.short_desc')
    ));
    $list_plan_types = array();
    foreach ($plan_types_data as $data) {
      $record =& $data['PlanTypes'];
      $list_plan_types[$record['plan_type_id']] = $record['short_desc'];
    }
    $this->filter_by_options['plan_type'] =& $list_plan_types;
    
    $carriers_data = $this->Carriers->find('all', array(
        'fields' => array('Carriers.carrier_id', 'Carriers.name'),
        'order' => array('Carriers.name')
    ));
    $list_carriers = array();
    foreach ($carriers_data as $data) {
      $record =& $data['Carriers'];
      $list_carriers[$record['carrier_id']] = $record['name'];
    }
    $this->filter_by_options['carrier'] =& $list_carriers;
  }

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
    $this->loadModel('PlanList');
    $isAjax = ($this->request->is('ajax')) ? true : false;
    if ($isAjax) {
      $this->layout = 'ajax';
    }

    $zip_code = '';
    $request =& $this->request;
    $post = null;
    $filter = array();
    if ($request->is('post')) {
      if (isset($request->data['Drugs'])) {
        $post =& $request->data['Drugs'];
        $zip_code = $post['zip_code'];
      } else if (isset($request->data['ZipFind'])) {
        $post =& $request->data['ZipFind'];
        $zip_code = $post['query'];
      }
      if ($zip_code > '') $filter['ZipFind.zip_code'] = $zip_code;
    }

    $rows_per_page = 10;
    $options = array(
        'fields' => array('ZipFind.plan_id', 'ZipFind.county_name','ZipFind.zip','ZipFind.zip_code','ZipFind.county_name', 'ZipFind.state_name', 
                          'ZipFind.name', 'ZipFind.web_addr', 'ZipFind.textcond', 'ZipFind.description', 'ZipFind.na_rating',
                          'ZipFind.montly_premium', 'ZipFind.health_deductable', 'ZipFind.drug_deductable'),
    );
    if (count($filter) > 0) {
      $options['conditions'] = $filter;
    }
    
    $countAll = $this->ZipFind->find('count', $options);
    $options = array_merge($options, array('limit' => $rows_per_page));
    $count = $this->ZipFind->find('count', $options);

    $this->ZipFind->recursive = 0;
    $planFinds = $this->ZipFind->find('all', $options);
    
    $this->set('planFinds',$planFinds);
    $this->set('countAll', $countAll);
    $this->set('count', $count);
    $this->set('rows_per_page', $rows_per_page);
    
    $this->loadFilterOptions();
    $this->set('filter_by_options', $this->filter_by_options);

    $this->layout ='PlansList';
  }
  
  public function commandAction() {

  }
  
  protected function checkAjax() {
    $isAjax = ($this->request->is('ajax')) ? true : false;
    if ($isAjax) {
      $this->layout = 'ajax';
    }
    return $isAjax;
  }
  
  public function addToFavorites() {
    $this->checkAjax();
    
    $plan_id = (int)$this->params['pass'][0];
    $message = '';
    if ($plan_id > 0) {
      if ($this->Favorites->add('Plans.Favorites', $this->loadModel('FavoritePlans'), 'plan_id', $plan_id, 'user_id')) {
        $message = 'Successfully added to favorites.';
      } else {
        $message = 'Failed to add to favorites.';
      }
    } else {
      $message = 'Invalid input parameter.';
    }
    $this->set('message', $message);
  }

  function search() {

  }

  public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('view', 'index', 'search', 'showPlansByZipAndCounty', 'addToFavorites', 'commandAction');
  }

}

?>