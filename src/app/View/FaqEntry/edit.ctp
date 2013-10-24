<?php


$catChoose='';

$entry=$dtls['FaqEntry'];


if(!empty($catList)) {

foreach($catList as $eCat) {
	$item=$eCat['FaqCat'];
	$catName=$item['faq_name'];
	$catID=$item['faq_id']; $sel='';
	if($entry['faq_id']==$catID) { $sel=' selected="selected"'; }
	
	$catChoose.='<option value="'.$catID.'"'.$sel.'>'.$catName.'</option>'."\n";
}

}

$pgContent='
<h2>Edit FAQ</h2><br />
<form method="post" action="" onsubmit="return vf_faq(this)">
<input type="hidden" name="_method" value="POST"/>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="formTable">
    <tr>
    	<td width="80">Question:</td><td>
    <input type="text" name="data[FaqEntry][faq_question]" size="80" id="faq_question" value="'.$entry['faq_question'].'"/></td></tr>
    	<td>Answer:</td><td>
	<textarea name="data[FaqEntry][faq_answer]" cols="80" rows="5" id="entry_text">'.$entry['faq_answer'].'</textarea></td></tr>
	<tr>
    	<td>Category:</td><td>
    <select name="data[FaqEntry][faq_id]" id="faq_cat">
    <option value="0"> -- choose -- </option>
	  '.$catChoose.'
    </select>
    </td></tr>
</table>
<input type="hidden" name="data[FaqEntry][faq_entry_id]" value="'.$entry['faq_entry_id'].'"/>
<br />
<input type="checkbox" name="data[delete_entry]" value="'.$entry['faq_entry_id'].'" id="delete_entry"/> <span class="red">Delete This FAQ</span>
<div align="center">
<input type="submit" value="Save FAQ"/>
</div>
</form><br />
';

?>
<div class="formDiv">
<?php echo $pgContent; ?>
<br /><br />
</div>