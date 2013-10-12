<?php

$catChoose='';

if(!empty($catList)) {


foreach($catList as $eCat) {
	$item=$eCat['FaqCat'];
	$catName=$item['faq_name'];
	$sel='';
	if(isset($catID) && $catID==$item['faq_id']) { $sel=' selected="selected"'; }
	$catChoose.='<option value="'.$item['faq_id'].'"'.$sel.'>'.$catName.'</option>'."\n";
}

}

?>
<div class="formDiv">
<h2>Add New FAQ</h2><br />
<form method="post" action="" onsubmit="return vf_faq(this)">
<input type="hidden" name="_method" value="POST"/>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="formTable">
    <tr>
    	<td width="80">Question:</td><td>
    <input type="text" name="data[FaqEntry][faq_question]" size="80" id="faq_question"/></td></tr>
    	<td>Answer:</td><td>
	<textarea name="data[FaqEntry][faq_answer]" cols="80" rows="5" id="entry_text"></textarea></td></tr>
	<tr>
    	<td>Category:</td><td>
    <select name="data[FaqEntry][faq_id]" id="faq_cat">
    <option value="0">-- choose --</option>
	<?php echo $catChoose; ?> 
    </select>
    </td></tr>
</table>
<br /><br />
<div align="center">
<input type="submit" value="Submit Question"/>
</div>
</form>
<br /><br />

</div>
