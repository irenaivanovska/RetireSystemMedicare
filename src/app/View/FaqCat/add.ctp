<?php 

echo '<h1>Add New Faq Category</h1>';

echo'
<form method="post" action="">
Name:
'.$this->Form->input('FaqCat.faq_name', array('label' => FALSE)).'
URL:
'.$this->Form->input('FaqCat.faq_url', array('label' => FALSE)).'
<input type="submit" name="submit"value="submit">
</form>

<br />
<br />
<a href="/faq_cat/admin">Cancel Add</a>
<br />
';

?>