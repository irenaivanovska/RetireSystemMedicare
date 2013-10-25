<?php
class ZipFindsController extends AppController{
  public $name = 'ZipFinds';
  public $useTable = 'plans'; //'vwplansbyzipnew_local';
  public $helpers = array('Html','Form');
  public $components = array('Favorites');

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
      $filter['ZipFind.zip_code'] = $zip_code;
    }

    $options = array(
        'fields' => array('ZipFind.plan_id', 'ZipFind.county_name','ZipFind.zip','ZipFind.zip_code','ZipFind.county_name', 'ZipFind.state_name', 'ZipFind.name', 'ZipFind.web_addr', 'ZipFind.textcond', 'ZipFind.description'),
        'limit' => 10
    );
    if (count($filter) > 0) {
      $options['conditions'] = $filter;
    }

    $this->ZipFind->recursive = 0;
    $planFinds = $this->ZipFind->find('all', $options);
    $this->set('planFinds',$planFinds);

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
    $this->Auth->allow('view', 'index', 'search', 'showPlansByZipAndCounty', 'addToFavorites');
  }

}

?>