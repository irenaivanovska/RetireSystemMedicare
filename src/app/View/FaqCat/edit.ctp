<?php 

echo '<h1>Edit Faq Category</h1>';

echo '
<form method="post" action="">
Name
'.$this->Form->input('FaqCat.faq_name', array('label' => FALSE,'value'=>@$dtls['FaqCat']['faq_name'])).'
URL:
'.$this->Form->input('FaqCat.faq_url', array('label' => FALSE,'value'=>@$dtls['FaqCat']['faq_url'])).'

'.$this->Form->input('FaqCat.faq_id', array('type'=>'hidden','label' => FALSE,'value'=>@$dtls['FaqCat']['faq_id'])).'
<input type="submit" name="submit"value="submit">

</form><br />
<br />
<a href="/faq_cat/admin">Cancel Edit</a>
<br />
';

?>