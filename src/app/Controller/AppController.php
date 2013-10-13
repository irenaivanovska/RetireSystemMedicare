<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

  public function beforeRender() {
  }


  public $components = array(
      'Session',
      'Auth' => array(
          //'loginAction' => array('controller' => 'users', 'users' => 'login'),
          'loginRedirect' => array('controller' => 'home', 'action' => 'index'),
          'logoutRedirect' => array('controller' => 'home', 'action' => 'index'),
          'authError' => 'We are sorry but you do not have permission to view the page you are requesting.',
          'authorize' => array('Controller'),
          'userModel' => array('Users'),
          'autoRedirect' => array('false')
      ));


  public function beforeFilter() {
    $this->helpers[] = 'Box';

    //$this->loadModel('FaqCat');
    //$newsUpdates=$this->FaqCat->getUpdates();
    //$this->set('FaqUpdates',$newsUpdates);

    	
    $this->set('logged_in', $this->Auth->loggedIn());
    $this->set('userid',$this->Auth->user('user_id'));
    $this->set('role',$this->Auth->user('role'));

    $currUser=$this->Auth->user();
    $this->set('current_user',$currUser);

    $user_name=$currUser['user_firstname'].' '.$currUser['user_lastname'];
    $this->set('user_name',$user_name);

    // add ones below that everyone can do..
     
    $this->Auth->allow('index','view','register','login','logout','home',
        'about','privacy','forgot_pass','contact','two_col','full', 'zip_finds');
  }

  public function isAuthorized($user) {

    $this->loadModel('Arl'); // make this call here to avoid child controllers from overriding the model needed here

    if (isset($user['role']) && $user['role'] === 'admin') {

      return true; //Admin can access every action
       
    } elseif (isset($user['role']) && $user['role'] === 'member') {

    		$url = $this->Auth->request->params['action'];
    		$testMember = $this->Session->read('cachedMemberActions');
    			
    		if (!empty($testMember)) {
    		  $memberActions = $this->Session->read('cachedMemberActions');
    		} else {
    		  $memberActions = $this->Arl->getMemberActions();
    		  $this->Session->write('cachedMemberActions', $memberActions);
    		}
    		$val = $this->page_test($url, $memberActions); // call the method to test permissions

    		if ($val) {
    		  return true;
    		} else { return false;
    		}
    			
    }

    return false; //they are not allowed to see the page requested
  }


  public function clean($val = null) {
    if(is_array($val)) {
      foreach($val as $k=>$v) {
        $newVal[$k]=$this->clean($v);
      }
    } else {
      $newVal = trim(strip_tags($val));
    }
    return $newVal;
  }



}

?>
