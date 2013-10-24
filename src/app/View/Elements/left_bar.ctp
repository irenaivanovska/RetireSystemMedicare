<?php


$boxCont='';

if($content=='account') {

	$boxCont='<div>account items</div>';


} elseif($content=='faq') {


	$onCat=false;

	if(isset($faqCats) && !empty($faqCats)) { 
		$fCats='';
		foreach($faqCats as $eCat) { 
			$cl='';
			if($eCat['active']===true) { $cl=' class="active"'; $onCat=true;}
			$fCats.='<li'.$cl.'><a href="/faq/'.$eCat['faq_url'].'">'.$eCat['faq_name'].'</a></li>'."\n";
		}
		
		$boxCont='<ul class="fCats">'.$fCats.'</ul>';
		
$searchLeft='
<div class="faq_search">
<form name="search_faq" method="post" action="/faq">
  <input type="text" name="data[FaqEntry][search]"/><br />
  <input name="data[find_faqs]" type="hidden" value="1" />
  <input type="submit" value="Search FAQ" />
</form>
</div>
';

if($onCat===true) { $boxCont.=$searchLeft; }
		
	}
	

}


if(!empty($boxCont)) { echo '<div id="leftbar">'.$boxCont.'</div>'; }


?>