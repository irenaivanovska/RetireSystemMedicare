<?php

$foundCats='';

foreach ($dtls as $post){
	
	$cat=$post['cat'];
	$faqID=$cat['faq_id'];
	$faqName=$cat['faq_name'];
	$numEnt=$post['num'];
	$entries=$post['entries'];
	$foundEnts='';
	foreach($entries as $eEnt) {
		
		$entryLink=$eEnt['faq_entry_url'];
		//$entryLink=$eEnt['faq_entry_id'];
		
		$entText=substr($eEnt['faq_answer'],0,300);
		
		$foundEnts.='
		<div>
		 <b>'.$eEnt['faq_question'].'</b>
		 <p>'.$entText.'...</p>
		 <a href="/entry/'.$entryLink.'">read more..</a>
		</div>
		';
	}
	
	$catLink=$cat['faq_url'];
	//$catLink=$cat['faq_id'];
	
	$foundCats.='
	<h2><a href="/faqs/'.$catLink.'">'.$faqName.'</a></h2>
	'.$numEnt.' entr'.($numEnt==1?'y':'ies').'.
	'.$foundEnts.'
	<br />
	';

}

if(empty($dtls)) { $foundCats='<b>No Faqs Found</b>'; }

echo'<h1>Faqs</h1>
<div id="faq">
'.$foundCats.'
</div>
';

// echo $this->element('pagination');
?>