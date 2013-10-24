<?php
$writeNote='';


$calList='';
$searchResult='';

if(isset($faqCats) && !empty($faqCats)) { 
	$fCats='';
	foreach($faqCats as $eCat) { 
		$cl='';
		if($eCat['active']===true) { $cl=' class="active"';}
		$fCats.='<li'.$cl.'><a href="/faq/'.$eCat['faq_url'].'">'.$eCat['faq_name'].'</a></li>'."\n";
	}
	
	$catList='<ul class="fCats">'.$fCats.'</ul>';
	
}


if(isset($foundFAQ)) {  // searching
	
	foreach($foundFAQ as $fMatch) {
		// key is num times matched
		$numRes=count($fMatch);
		$searchRes='';
		if($numRes>0) {
			foreach($fMatch as $eFaq) { $searchRes.=$this->Box->faq($eFaq); }
			$searchRes.='<br />';
		}
		$searchResult='
		Search for <b>'.$searchTerm.'</b> :: '.$numRes.' Result'.($numRes==1?'':'s').'<br /><br />
		<div id="search_result">
		'.$searchRes.'
		</div><br />
		';
	
	}

}


if($index===true) { 
$foundCats='';

echo '<h1>FAQ</h1>
<div id="faq">
'.$searchResult.'
&lt; Choose a FAQ Category from the list, OR
</div><br />
<div>
<form name="search_faq" method="post" action="/faq">
  <input type="text" name="data[FaqEntry][search]" size="30"/> 
  <input name="data[find_faqs]" type="hidden" value="1" />
  <input type="submit" value="Search FAQ" />
</form>
</div>
';


} else {


$allEntries='';
$numEntries=count($foundEntries);

if(empty($foundEntries)) { $allEntries='<b>No Faqs Found</b>'; }

foreach ($foundEntries as $eEntry){
	$allEntries.=$this->Box->faq($eEntry,$role);
} 

if($logged_in && $role == "admin") { 
	$writeNote='<br /><br />
	Admin :: <a href="/faq_entry/write/'.$dtls['FaqCat']['faq_id'].'"><b>Add a New FAQ</b></a><br />';
}

echo '
<h1>'.$dtls['FaqCat']['faq_name'].'</h1>
<div id="faq">
'.$allEntries.'
</div>
'.$writeNote.'
';

}

?>         