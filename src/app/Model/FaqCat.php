<?php

class FaqCat extends AppModel {
	public $name = 'FaqCat';
    public $useTable = 'faq';
    
    public $primaryKey = 'faq_id';
	
	public $_schema = array(
		'faq_id'=>array('type' => 'integer','key' => 'primary'),
		'faq_name'=>array('type' => 'string'),
		'faq_url'=>array('type' => 'string'),
	);
	
	public function getCat($catID) {
		if(empty($catID)) { return array(); }
		
		$cat=$this->find('first',array('conditions'=>array('faq_id'=>$catID)));
		$catRes=$cat['FaqCat'];
		return $catRes;
	
	}
	
	public function catsWithEnt() { // gets cats an entry is in
		$numEnt=array();
		$sql="SELECT f.`faq_id`, f.`faq_name`, f.`faq_url`, count(fe.`faq_entry_id`) as num  
		FROM `faq` f, `faq_entry` fe
		WHERE f.`faq_id` = fe.`faq_id`
		GROUP BY f.`faq_id` ORDER BY `faq_name`";
		$catSql = $this->query($sql);
		
		if(!empty($catSql)) { 
			foreach($catSql as $eCat) {
				$faq_id=$eCat['f']['faq_id'];
				$data['faq_id']=$eCat['f']['faq_id'];
				$data['faq_name']=$eCat['f']['faq_name'];
				$data['faq_url']=$eCat['f']['faq_url'];
				$data['num']=$eCat[0]['num'];
				$numEnt[$faq_id]=$data;
			}
		}
		return $numEnt;
	}
	
}

?>