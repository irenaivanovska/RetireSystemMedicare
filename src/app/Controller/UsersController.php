<?php

class UsersController extends AppController {
    public $helpers = array ('Html','Form');
    public $name = 'Users';
    public $uses = array('Users');
	public $primaryKey = 'user_id';
	
	// new field: `referred_by`
	// new field: `ARB_subscript`
	
	public function beforeRender() {
        
	}
	
	
		
    public function index() {

	
	} /* end function */
	
	
	public function view($user_id = null) {
		//$this->Userss->user_id = $user_id;
		//debug($user_id);
		//debug($this->Auth->user());
		$this->set('users', $this->Users->findByUserId($user_id));
		
		
	} /* end function */
	
	
   
	function edit($var1 = null) {} /* end function */
	
//----------------- REGISTRATION STEPS -------------------------------------------
	
	public function register() {
	 	 $this->layout = 'container';
		if ($this->request->is('post')) {
			
			$postData=$this->request->data;
			
			$postData['Users']['role']='member';
			
			$this->Users->create();
			
			if ($this->Users->save($postData)) {
				$nbr = $this->Users->getLastInsertID();
				$this->Session->write('lastID', $nbr);
				//$this->Users->role_update($nbr); // updates role to member
				
			  $creds=array();
			  $creds['User']['username']=$postData['Users']['username'];
			  $creds['User']['password']=$postData['Users']['password'];
			  $_SESSION['tmp_pass']=$postData['Users']['password'];
			  
			  $this->request->data=$creds;
			  $this->login(true); // auto login
				
			$this->Session->setFlash('Welcome');
			//$this->redirect(array('controller' => 'users', 'action' => 'login', 1));
			}
		}
		$this->set('title_for_layout', 'Register');
	} /* end function */
	
	
	function member_type() {}
	
	
	function member_info($user_id = null) {
		//$this->layout = 'formatted_container';
		$this->layout = 'container';
		
		$user_id = $this->Auth->user('user_id');
		$this->Session->write('userID', $user_id);
		$user_name=$this->Auth->user('username'); 
		
			if (!empty($this->request->data)) {
				$postData=$this->request->data;
				
				$firstName=$postData['Users']['user_firstname'];
				$lastName=$postData['Users']['user_lastname'];
				$emailAddy=$postData['Users']['user_email_address'];
				$referred=$postData['Users']['referred_by'];
				
				$firstname = $this->quoteIt($firstName); 
				$lastname = $this->quoteIt($lastName); 
				$email = $this->quoteIt($emailAddy);
				$referred = $this->quoteIt($referred);			
				/* update the users table with form data contained in $this->data array*/
				
				$updateInfo=$this->Users->updateAll(array(
					'user_firstname' => $firstname, 
					'user_lastname' => $lastname, 
					'user_email_address' => $email,
					'referred_by'=>$referred
					),
					array('user_id' => $user_id)
					);
				
				if ($updateInfo) {
					
					$this->Session->write('Auth.User.user_firstname',$firstName);
					$this->Session->write('Auth.User.user_lastname',$lastName);
				
				if ($postData['type'] === "save") { 
					
					$this->Users->updateAll(array('step' => '2'),array('user_id' => $user_id));
					$this->Session->write('Auth.User.step','2'); // contact done..
					
					if(!empty($_SESSION['tmp_pass'])) { // welcome email
						$user_pass=$_SESSION['tmp_pass'];
						$message=array('username'=>$user_name,'password'=>$user_pass);
						$this->Users->emailer($user_id,'memberWelcome',$message);
						unset($_SESSION['tmp_pass']);
					}					
					//$this->Session->setFlash('Now, Create your Practice');
					//$this->redirect(array('controller' => 'practice', 'action' => 'create_practice'));
					$this->redirect(array('controller' => 'address', 'action' => 'step_three'));
					
				} else { 	
					$this->Session->setFlash('Name and Email Updated');
					$this->redirect(array('controller' => 'account', 'action' => 'index'));
				}
				
				}
			}
		
		$this->set('user_id', $user_id);
		$this->set('title_for_layout', 'Member Info');
		//$this->set('contactInfo', $this->Users->find('all', array('conditions' => array('user_id' => $user_id))));
		
		$conInfo=$this->Users->find('first', array('conditions' => array('user_id' => $user_id)));
		$this->set('contactInfo',$conInfo);
		
		
	} /* end function */



//----------------- REGISTRATION STEPS -------------------------------------------	

	
	public function change_pass(){
		$this->layout = 'container';
		
		$user_id = $this->Auth->user('user_id');
		$this->Session->write('userID', $user_id);
		$user_name=$this->Auth->user('username');
		if (!empty($user_id)){
			if ($this->request->is('post')) {
				$postData=$this->request->data;
				if (!empty($postData['User']['password'])){
					$newPass=$postData['User']['password'];
					$confPass=$postData['User']['password_confirmation'];
					if($newPass==$confPass) { 
						$user_id=$user_id;
						$postField['Users.password'] = "'".AuthComponent::password($postData['User']['password'])."'";
						$this->Users->updateAll($postField,array('user_id' =>$user_id));
						
						$this->Session->setFlash('Done. Next time, please Login with your new password');
						$this->redirect('/account');
						//exit;
					} else { 
						$this->Session->setFlash('Error. Passwords do not match');
						$this->redirect('/users/change_pass');
						//exit;
					}
				} else {
					$this->Session->setFlash('Error. Password was blank');
					$this->redirect('/users/change_pass');
				}
			}// end if post
			  
		} 
		$this->set('title_for_layout', 'Change Password');  
	}
	
	public function forgot_pass($token=null){
		$this->layout = 'container';
		$sess_id=session_id(); //CAKE_SESSION_STRING
		$userInfo=array();
		
		if(!empty($token)) { 
			$userInfo=$this->check_token($token,$sess_id);
		} else {
		
			if ($this->request->is('post')) {
				$postData=$this->request->data;
				
				if (!empty($postData['User']['user_id'])){
				
					$userInfo=$this->check_token($postData['token'],$sess_id);
					$postUserId=$postData['User']['user_id'];
					
					if($postUserId!=$userInfo['user_id']) { 
						$this->Session->setFlash('Error. Please try Again');
						$this->redirect('/users/forgot_pass');
					}
					
					if (!empty($userInfo) && !empty($postData['User']['password'])){
						
						unset($postData['token'],$postData['username']);
						$newPass=$postData['User']['password'];
						$confPass=$postData['User']['password_confirmation'];
						if($newPass==$confPass) { 
							$user_id=$userInfo['user_id'];
							$postField['Users.password'] = "'".AuthComponent::password($postData['User']['password'])."'";
							$this->Users->updateAll($postField,array('user_id' =>$user_id));
							
							$this->Session->setFlash('Done. Please Login with your new password');
							$this->redirect('/users/login');
							
						} else { 
							$this->Session->setFlash('Error. Passwords do not match');
							$this->redirect('/users/forgot_pass');
						}
						
					}
					
				} else{ 
					if (!empty($postData['User']['email'])){ $this->set_token($postData,$sess_id); } 
					else { $this->Session->setFlash('Please provide your username and email'); }
				}
			  
			} // end if post
		} 

		  $this->set('user', $userInfo);
		  $this->set('token', $token);
		  $this->set('title_for_layout', 'Forgot Password');
		  
	}
	
	function set_token($postData,$sess_id) {
	
		$userName=$postData['User']['username'];
		$userEmail=$postData['User']['email'];
			
		$params=array('conditions' => array('Users.username' => $userName,'Users.user_email_address'=>$userEmail));
		$user = $this->Users->find('first',$params);
				
		if (empty($user)){ 
			$this->Session->setFlash('Invalid username or email address.'); 
		} else {
			$user_id=$user['Users']['user_id'];
			$username=$user['Users']['username'];
			$emailtoken = md5($user_id.$username.$sess_id);
			
			$message='http://'.$_SERVER['HTTP_HOST'].'/users/forgot_pass/'.$emailtoken;
			$this->Users->emailer($user_id,'forgotPass',$message);
			$this->Session->setFlash('Please check your email.');
		}
	
	}
	
	function check_token($token,$sess_id) {
		
		$params=array('conditions' => array("MD5(CONCAT(Users.user_id,Users.username,'".$sess_id."'))" => $token));
		$user = $this->Users->find('first',$params);

		if (empty($user)){ $this->Session->setFlash('Invalid token.'); $userInfo=array(); }
		else { $userInfo=$user['Users']; }
		
		return $userInfo;
	
	}
	
	
	public function login($auto=null) {
	
	    if ($this->request->is('post')) {
			
	        if ($this->Auth->login()) {
	                      
	          
	        	//$this->redirect($this->Auth->redirect());
				if($auto===true) { $this->redirect(array('controller' => 'users', 'action' => 'member_type')); } 
				else { 
					$redirect_check=$this->Session->check('redirect');
					if($redirect_check===true) { 
						$redirect_to=$this->Session->read('redirect');
						$this->Session->delete('redirect');
						$this->redirect(array('controller' => $redirect_to));
					} else { $this->redirect(array('controller' => 'account','action'=>'index')); }
				
				};
				
			} else {
	            $this->Session->setFlash('The username or password you used is incorrect');
	        }
	    }
		 $this->layout = 'container';
		$this->set('title_for_layout', 'Login');
		
	} //END LOGIN
 
 
 	public function logout() {
 		$this->Session->destroy('user');
        $this->Session->setFlash('You\'ve successfully logged out.');
        //$this->redirect('login');
  		$this->redirect(array('controller' => 'users', 'action' => 'login'));
 	} //END LOGOUT
 
	

} 
	

?>
