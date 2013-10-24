<?php

class FaqEntryController extends AppController {
    public $helpers = array ('Html','Form');
    public $name = 'FaqEntry';
    public $uses = array('FaqCat','FaqEntry');
	
	public $page_description = 'Faq Entries';
	public $page_keywords    = '';
	
	public function beforeRender() {
		$catList=$this->FaqCat->catsWithEnt();
        $this->set('faqCatList', $catList); 
		
		$page_description = $this->page_description;
		$page_keywords    = $this->page_keywords;
		
		$this->set('description_for_page', $page_description);
		$this->set('keywords_for_page', $page_keywords);
		
	}
	
	
	function admin() { 
		
		$all=$this->FaqEntry->find('all',$condits); // all entries
		$allFound=array();
		foreach($all as $found) {
			$item=$found['FaqEntry'];
			$allFound[]=$item;
		}
		
		$this->set('dtls',$allFound);
		$this->set('tab','faq');
		$this->set('title_for_layout','Pending Faqs');
	}
	
	function find_entry($faq_ent_url) {
		$faq_entry_id=0;
		$params=array('conditions' => array('FaqEntry.faq_entry_url' => $faq_ent_url));
		$result=$this->FaqEntry->find('first',$params);
		if(!empty($result)) { 
			$faq_entry_id=$result['FaqEntry']['faq_entry_id'];
		}
		return $faq_entry_id;
	}
	
	function index() { 
		
		$user_id=0;
		if ($this->Auth->user()) { 
			$user=$this->Auth->user();
			$user_id=$user['user_id'];
			$role=$user['role'];
			$this->set('role', $role);
			$this->set('user_id', $user_id);
		}
		
		$allFound=array();
		
		if(!empty($user_id)) {
			$all=$this->FaqEntry->find('all'); // all entries
			$allFound=array();
			foreach($all as $found) {
				$item=$found['FaqEntry'];
				$entID=$item['faq_entry_id'];
				$item['cat']=$this->FaqCat->getCat($item['faq_id']);
				$allFound[]=$item;
			}
		}

		$this->set('dtls',$allFound);
		
		$this->set('tab','faq');
		$this->set('title_for_layout','Faq');
	}

	function view($id=NULL,$url_val=NULL) { // viewing 1 faq entry
		
		$this->set('GA',true);
		$viewMine=false;
		$role='';
		if ($this->Auth->user()) { 
			$user=$this->Auth->user();
			$user_id=$user['user_id'];
			$role=$user['role'];
			$this->set('role', $role);
			$this->set('user_id', $user_id);
		}
		
		if(empty($id) && !empty($url_val)) { 
			$id=$this->find_entry($url_val);
		}
		
		if(empty($id)) { $this->redirect(array('controller'=>'faqs','action'=>'index'));  }
		
		$cons['faq_entry_id']=$id;
		$cons['user_id']=$user_id;
		
        $found = $this->FaqEntry->find('first',array('conditions' => $cons));
		$item=$found['FaqEntry'];
		$entID=$item['faq_entry_id'];
		$entTitle=$item['faq_question'];
		$item['cat']=$this->FaqCat->getCat($item['faq_id']);
		$details=$item; 
		
		$this->set('tab','faq');
        $this->set('dtls', $details);
		$this->set('title_for_layout',$entTitle);
    }
	
	function write($catID=NULL) { 
		
		
		if ($this->Auth->user()) { 
			$user=$this->Auth->user();
			$user_id=$user['user_id'];
			$role=$user['role'];
		}
		$this->set('role', $role);
		$this->set('user_id', $user_id);
		
		if($role!='admin') { $this->redirect('/'); }
		
	  // when adding, also get cats avail, and cats it's going to be put in ... FaqToEntry
       if (!empty($this->data)) {
            if ($this->request->is('post')) {
				$postData=$this->data;
				
				$postData['FaqEntry']['user_id']=$user_id;
				$entryTitle=$postData['FaqEntry']['faq_question'];
				$entryURL=$this->urlTitle($entryTitle);
				$postData['FaqEntry']['faq_entry_url']=$entryURL;
				$catID=$postData['FaqEntry']['faq_id'];
				
                $this->FaqEntry->create();
                if ($this->FaqEntry->save($postData)) {
				
					$entryID = $this->FaqEntry->getLastInsertId();
					
                    $this->Session->setFlash('Your FAQ has been added.');
					$this->redirect(array('controller'=>'faq_cat','action'=>'view',$catID));
                   
                } else {
                    $this->Session->setFlash('Unable to add your Faq.');
                }
            }
        } 
		
		$condits=array('order'=>array('FaqCat.faq_name'));
		$catList=$this->FaqCat->find('all',$condits);
		
		$this->set('catList',$catList);
		
		if(!empty($catID)) { $this->set('catID',$catID); }
		
$addJS='
<script type="text/javascript" src="/js/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "exact",
		elements: "entry_text",
		theme : "simple"
	});
</script>';
	  //$this->set('addJS',$addJS);
	  
      $this->set('title_for_layout','Add your Faq');
    }
	
	function edit($entry_id=NULL) {  
		
		// when editing, also get cats avail, and cats it's in ... FaqToEntry
		
		if ($this->Auth->user()) { 
			$user=$this->Auth->user();
			$user_id=$user['user_id'];
			$role=$user['role'];
		}
		
		if($role!='admin') { $this->redirect('/'); }
		
		$this->set('role', $role);
		$this->set('user_id', $user_id);
		
		$this->FaqEntry->id=$entry_id;
		
		if ($this->request->is('post')) {
		
			$postData=$this->data;
			
			//$postData['FaqEntry']['user_id']=$user_id;
			
			$entry_id=$postData['FaqEntry']['faq_entry_id'];
			$this->FaqEntry->id=$entry_id;
			
			$catID=$postData['FaqEntry']['faq_id'];
			
			if(isset($postData['delete_entry']) && $postData['delete_entry']==$entry_id) { // admin delete
				$this->FaqEntry->deleteAll(array('faq_entry_id' => $entry_id),false);
				$this->Session->setFlash('FAQ Deleted');
				$this->redirect(array('controller'=>'faq_cat','action'=>'view',$catID));
				exit;
			}

			$entryTitle=$postData['FaqEntry']['faq_question'];
			$postData['FaqEntry']['faq_entry_url']=$this->urlTitle($entryTitle);
			
			$updateEntry=$this->FaqEntry->save($postData);
			
			if ($updateEntry) {
			   $this->Session->setFlash('Your FAQ has been saved.');
			   $this->redirect(array('controller'=>'faq_cat','action'=>'view',$catID));
			   
			 } else { $this->Session->setFlash('Unable to edit your faq.'); }
		}
			
		$details=$inCats=array();
		$noEdit=true;
        if (!empty($entry_id)) {
			$noEdit=false;
			if($role!='admin') { 
				$condit['FaqEntry.faq_entry_id']=$entry_id;
				$condit['FaqEntry.user_id']=$user_id; // only theirs
			} 
			 $condit['FaqEntry.faq_entry_id']=$entry_id;
            $details = $this->FaqEntry->find('first',array('conditions' => $condit));
        }
		
		$condits=array(
			'order'=>array('FaqCat.faq_name')
			);
		$catList=$this->FaqCat->find('all',$condits);
		
		$this->set('catList',$catList);
		
$addJS='
<script type="text/javascript" src="/js/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "exact",
		elements: "entry_text",
		theme : "simple"
	});
</script>';
	  //$this->set('addJS',$addJS);

		$this->set('dtls', $details);
       $this->set('title_for_layout','Edit Faq');
	}
	
	
	function urlTitle($Raw) {
		$Raw = trim($Raw);
		$RemoveChars  = array( "([\40])" , "([^a-zA-Z0-9_])", "(-{2,})" );
		//$ReplaceWith = array("-", "", "_");
		$ReplaceWith = "-";
		$new_name=preg_replace($RemoveChars, $ReplaceWith, $Raw);
		$new_name=strtolower($new_name);
		return $new_name;
		
	}
	

}

?>