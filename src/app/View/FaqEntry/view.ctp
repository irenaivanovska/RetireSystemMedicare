<?php

$eEntry=$dtls;

$entId=$eEntry['faq_entry_id'];

	$comma=$entCats='';
	if(!empty($eEntry['cat'])) {
		$cat=$eEntry['cat'];
		$entCats='<a href="/faqs/'.$cat['faq_url'].'">'.$cat['faq_name'].'</a>'; 
	}
	
	$entDate=date('M. jS, Y',strtotime($eEntry['faq_entry_date']));
	$entryLink=$eEntry['faq_entry_url'];
		//$entryLink=$eEnt['faq_entry_id'];
	$bAuth=$eEntry['author']; $author='';
	
	$entDate=date('M. jS, Y',strtotime($eEntry['faq_entry_date']));
	
	if(!empty($bAuth)) { 
		if($bAuth['active']==1) { 
			$author='By: <a href="/pro/'.$bAuth['url'].'">'.$bAuth['name'].'</a><br />'; 
		}
	}
	$added='Added: '.$entDate.'';
	
	// 'fl'.$entID.'.jpg';
	$faqPic='<img src="/img/faq/'.$eEntry['fl_pic'].'" alt="'.$eEntry['faq_question'].'"/>';
	$entText=$eEntry['faq_answer'];
	
	$theEntry='
	<div>
		<div class="blPic">'.$faqPic.'</div><br />
		<h3>'.$eEntry['faq_question'].'</h3>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
		    <td>
			Color: '.$eEntry['faq_color'].'<br />
			Season: '.$eEntry['faq_season'].'
			</td>
			<td>
			 <span class="en_date">'.$author.$added.'</span><br />
			 
			</td>
		  </tr>
		</table>
		<p>'.$entText.'</p><br />
		<span class="ent_cat">in: '.$entCats.'</span>
	</div>
		';
		
$adminLink='';		
if($approve==true) { $adminLink='<b>ADMIN:</b> <a href="/faq_entry/edit/'.$entId.'">Edit/Manage this Faq</a>'; }

$editLink='';
if($viewMine===true) { 
	$approved=$eEntry['faq_entry_approved'];
	$pend='';
	if($approved==0) { $pend='* Pending Approval :: '; }
	$editLink='
		<span class="ent_pend">'.$pend.'<a href="/faq_entry/edit/'.$entId.'">Edit Faq</a>
		<br /><br /></span>';
}

echo '<a href="/faqs">&lt; All Faqs</a><br /><br />
<h1>'.$eEntry['faq_question'].'</h1>
'.$editLink.'
<div id="faq">
'.$theEntry.'
</div>
<br />
'.$adminLink.'
<br />
';


?>        