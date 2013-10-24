<?php

$theEntry='';

$myEntries='<b>No Faqs Found</b>';
$writeNote='';

$pgTitle='<h1>Faqs</h1>';
if(!empty($author)) { $pgTitle='<h1>Faqs by '.$author.'</h1>'; }
if($viewMine===true) { $pgTitle='<h1>My Faqs</h1>'; }

if($logged_in) { $writeNote='<br /><a href="/faq_entry/write"><b>Add a New Faq</b></a><br />'; }

if(!empty($dtls)) { 
foreach($dtls as $eEntry) {
	$theEntry.=$this->Box->faq($eEntry,$viewMine);
}

$myEntries=$theEntry;

}



echo '<a href="/faq">&lt; All Faqs</a><br /><br />
'.$pgTitle.'
<div id="faq">
'.$myEntries.'
</div>
'.$writeNote.'
<br /><br />
';

?>