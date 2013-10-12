<?php


$entId=$eEntry['faq_entry_id'];
	$entCatsAr=$eEntry['cats'];
	$comma=$entCats='';
	foreach($entCatsAr as $catKey=>$eCat) { 
		$entCats.=$comma.'<a href="/faq/'.$eCat['url'].'">'.$eCat['name'].'</a>'; 
		$comma=', '; 
	}
	
	$entDate=date('M. jS, Y',strtotime($eEntry['faq_entry_date']));
	$entryLink=$eEntry['faq_entry_url'];
		//$entryLink=$eEnt['faq_entry_id'];
	$bAuth=$eEntry['author']; $author='';
	
	$picCell='';
	if(!empty($bAuth)) { 
		
		if(!empty($bAuth['pic'])) { 
			$picCell='
			<td width="60" class="blPic">
				<img src="/img/profile/'.$bAuth['pic'].'" alt="'.$bAuth['name'].'"/>
			</td>';
		} 
		if($bAuth['active']==1) { 
			$author='by <a href="/pro/'.$bAuth['url'].'">'.$bAuth['name'].'</a>'; 
		}
	}
	
	$entText=substr($eEntry['faq_answer'],0,300);
	$entryLink=$eEntry['faq_entry_url'];
	//nl2br($eEntry['faq_answer'])
	$allEntries.='
	<div>
	  <b>'.$eEntry['faq_question'].'</b> &nbsp; <span class="en_date">'.$entDate.'</span><br />
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			'.$picCell.'
			<td>
			<span class="en_date">'.$author.'</span>
			<p>'.$entText.' ...</p>
		 	<a href="/entry/'.$entryLink.'">read more..</a></td>
		  </tr>
		</table>
	 <span class="ent_cat">written in: '.$entCats.'</span>
	</div>
		';

?>