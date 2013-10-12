<?php

class FaqCatController extends AppController {
    public $helpers = array ('Html','Form','Box');
    public $name = 'FaqCat';
   public $uses = array('FaqCat','FaqEntry');
	
	public function beforeRender() {
		$catList=$this->FaqCat->catsWithEnt();
        $this->set('faqCatList', $catList); 

		$page_description = 'Faq';
		$page_keywords    = '';
		
		$this->set('description_for_page', $page_description);
		$this->set('keywords_for_page', $page_keywords);
		
		$this->set('top_left','faq');
		$this->set('left_bar','faq');
		
	}
	
	
	function admin() {
		
		$all=$this->FaqCat->find('all',array('order'=>'faq_name'));
		$this->set('dtls',$all);
		$this->set('tab','faq');
		
		$this->faqCats('admin');
		
		$this->set('title_for_layout','Faq Categories');
		
	}
	
	function find_faq($faq_url) {
		$faq_id=0;
		
		$params=array('conditions' => array('FaqCat.faq_url' => $faq_url));
		$result=$this->FaqCat->find('first',$params);
		if(!empty($result)) { 
			$faq_id=$result['FaqCat']['faq_id'];
		}
		
		return $faq_id;
	}
	
	public function faqCats($role=NULL) {
	
		$found=array();
		$all=$this->FaqCat->find('all',array('order'=>'faq_name'));
		
		$entCount=$this->FaqEntry->numEntriesInCats();
		
		foreach($all as $eB) { 
			$eFaq=$eB['FaqCat'];
			$faqID=$eFaq['faq_id'];
			$numEnt=isset($entCount[$faqID])?$entCount[$faqID]:0;
			if($numEnt==0 && $role!='admin') { continue; }
			$act=false;
			if($this->FaqCat->id==$faqID) { $act=true; }
			$eFaq['active']=$act;
			
			$found[$faqID]=$eFaq;
			//$found[$faqID]['num']=$numEnt;
			//$found[$faqID]['entries']=$this->getEntries($faqID,$limit);
		}
		
		$this->set('faqCats',$found);
		
		return $found;
		
	}
	
	public function index($seo=NULL) { 
		
		$this->set('title_for_layout','Faqs');

	}
	
	function findTerms($searchTerm) {
		$quoted=array();
		
		if(strpos($searchTerm,'"')!==false) { 
			preg_match_all('/"(.*)"/U',$searchTerm,$matches);
			if(!empty($matches[0])) { 
				foreach($matches[1] as $mKey=>$em){ 
					$ogt=$matches[0][$mKey];
					$quoted[$mKey]=trim($em);
					$searchTerm=preg_replace('/'.$ogt.'/','',$searchTerm);
				}
			}
		}
		$restSearch=trim($searchTerm);
		$restAr=explode(' ',$restSearch);
		
		$fullAr=array_merge($restAr,$quoted);
		
		return $fullAr;
	}
	
	function searchFAQ($postData) {
		$foundFAQ=array();
		
		if(!isset($postData['find_faqs'])) { return array(); }
		
	  	// faq cat search/ by name search ??
		$searchTerm=$postData['FaqEntry']['search'];
		// search ['faq_question'] ??
		
		// explode on space?  .. 
		$condits='';
		$OR=array();
		$st=$rep=array();
		
		$terms=$this->findTerms($searchTerm);
		if(!empty($terms)) {
			foreach($terms as $eT) {
				if(empty($eT)) { continue; }
				$OR[]['faq_question LIKE']='%'.$eT.'%';
				$OR[]['faq_answer LIKE']='%'.$eT.'%';
				
				$st[]='/'.$eT.'/i';
				$rep[]='<span class="hl">'.$eT.'</span>';
				$stw[]=$eT;
			}
			
		}
		unset($eT);
		//$condits=array('conditions'=>array('faq_answer LIKE' => '%'.$searchTerm.'%'));
		if(!empty($OR)) { 
			$condits=array('conditions'=>array('OR'=>$OR));
			$faqSearch=$this->FaqEntry->find('all',$condits);
		}
		
		if(!empty($faqSearch)) { 
			$f=0;
			foreach($faqSearch as $eRes) {
				$item=$eRes['FaqEntry'];
				$ques=$item['faq_question'];
				$ans=$item['faq_answer'];
				foreach($stw as $eT) { 
					if(stripos($ans,$eT)!==false || stripos($ques,$eT)!==false) { $f++; } // finds how many words matched	
				}
				if(stripos($ans,$searchTerm)!==false || stripos($ques,$searchTerm)!==false) { $f+=5; } // add bonus points
				
				$new_ans=preg_replace($st, $rep, $ans);
				$item['faq_answer']=$new_ans;
				$foundFAQ[$f][]=$item;
			}
			krsort($foundFAQ);
		}
		
		$this->set('searchTerm', $searchTerm);
		return $foundFAQ;
	
	}
	
	
	public function view($id=NULL,$url_val=NULL,$page=NULL) { // for viewing a category
	
	// instead of id , catch the url value , `faq_url`
		// when viewing, get entries in this cat  ... FaqToEntry
		$role=NULL;
		
		if ($this->Auth->user()) { 
			$user=$this->Auth->user();
			$user_id=$user['user_id'];
			$role=$user['role'];
			$this->set('user_id', $user_id);
		}
		
		
		if ($this->request->is('post')) {
			$postData=$this->data;
			$searchRes=$this->searchFAQ($postData);
			$this->set('foundFAQ', $searchRes);
		} 
		
		if(empty($page)) { $page=1; }
		$limit=10;
		
		if(empty($id) && empty($url_val)) { 
			
			$this->set('index',true);
			$this->set('title_for_layout','FAQ');
			
		} else { 
			
			if(empty($id) && !empty($url_val)) { $id=$this->find_faq($url_val); }
			
			$details = $this->FaqCat->find('first', array('conditions' => array('FaqCat.faq_id' => $id)));
			
			$this->FaqCat->id=$id;
			$foundEntries=$this->getEntries($id,$limit,$page);
			$catName=$details['FaqCat']['faq_name'];
			
			$this->set('title_for_layout','FAQ :: '.$catName);
			$this->set('foundEntries', $foundEntries);
			
			$this->set('dtls', $details);
			$this->set('index',false);
		
		}
		
		$this->faqCats($role);
		$this->set('tab','faq');
		
    }
	
	function getEntries($catID,$limit=NULL,$page=NULL) {
		$foundEntries=array();
		//$entIDs=$this->FaqToEntry->getEntriesInCat($id); // (list of ids)
		
		$condits=array(
			'conditions' => array('faq_id' => $catID)
			//'limit'=> $limit,
			//'page'=> $page
		);
		$entries=$this->FaqEntry->find('all',$condits); // get author, get cats in.
		foreach($entries as $eEntry) { 
			$item=$eEntry['FaqEntry'];
			$entID=$item['faq_entry_id'];
			$item['cat']=$this->FaqCat->getCat($item['faq_id']);
			$foundEntries[]=$item;
		}
		return $foundEntries;
	}
	
	
	// admin ONLY ----------------------------------------------------------
	
	function add() { 
		
		if ($this->Auth->user()) { 
			$user=$this->Auth->user();
			$user_id=$user['user_id'];
			$role=$user['role'];
			$this->set('role', $role);
			$this->set('user_id', $user_id);
		}
		
	   if($role!='admin') { $this->redirect('/'); }
		
       if (!empty($this->data)) {
            if ($this->request->is('post')) {
                $this->FaqCat->create();
                if ($this->FaqCat->save($this->data)) {
                    $this->Session->setFlash('Your new Category has been saved.');
                    $this->redirect(array('action' => 'admin'));
                } else {
                    $this->Session->setFlash('Unable to add your Category.');
                }
            }
        }  
		$this->set('title_for_layout','Add Faq Category');  
    }
	
	function edit($id=NULL) { 
		
		if ($this->Auth->user()) { 
			$user=$this->Auth->user();
			$user_id=$user['user_id'];
			$role=$user['role'];
			$this->set('role', $role);
			$this->set('user_id', $user_id);
		}
		
	   if($role!='admin') { $this->redirect('/'); }
		
        if (isset($id)) {
            $details = $this->FaqCat->find('first', array('conditions' => array('FaqCat.faq_id' => $id)));
            $this->set('dtls', $details);
        }
        //print_r($this->data);
		if ($this->request->is('post')) {
			if (!empty($this->data)) {
				if ($this->FaqCat->save($this->data)) {
					$this->Session->setFlash('Category changed has been saved.');
					$this->redirect(array('action' => 'admin'));
				} else { $this->Session->setFlash('Unable to edit.'); }
			}
		}		
		$this->set('title_for_layout','Edit Faq Category'); 		
     }
	

}

?>