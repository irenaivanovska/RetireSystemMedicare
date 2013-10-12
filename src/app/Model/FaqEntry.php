<?php

class FaqEntry extends AppModel {
    public $name = 'FaqEntry';
    public $useTable = 'faq_entry';
    
    public $primaryKey = 'faq_entry_id';
	
	public $_schema = array(
		'faq_entry_id'=>array('type' => 'integer','key' => 'primary'),
		'user_id'=>array('type' => 'integer'), // who wrote it.. or profile_id?
		'faq_id'=>array('type' => 'integer'),  // what category it's in `faq`.`faq_id`
		'faq_question'=>array('type' => 'string'),
		'faq_entry_url'=>array('type' => 'string'),
		'faq_answer'=>array('type' => 'text'),
	);
	
	
	public function numEntriesInCats() { // gets cats an entry is in
		$numEnt=array();
		$sql="SELECT count(`faq_entry_id`) as num, `faq_id` FROM `faq_entry` GROUP BY `faq_id`";
		$catSql = $this->query($sql);
		
		if(!empty($catSql)) { 
			foreach($catSql as $eCat) {
				$faq_id=$eCat['faq_entry']['faq_id'];
				$numEnt[$faq_id]=$eCat[0]['num'];
			}
		}
		return $numEnt;
	}
	

}

?>