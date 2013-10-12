<h1>Faq Categories</h1>
<?php 
echo '
<table width="400" border="0" cellspacing="0" cellpadding="0" class="dataTable">
  <tr>
        <th>Name</th>
        <th>URL</th>
		<th>&nbsp;</th>
    </tr>
';
    
foreach ($dtls as $post) { 
    $item=$post['FaqCat'];
	echo '
	<tr>
      <td>'.$item['faq_name'].'</td>
	  <td>'.$item['faq_url'].'</td>
      <td><a href="/faq_cat/edit/'.$item['faq_id'].'">Edit</a></td>
    </tr>';
	  
 } 

echo '</table><br />
<a href="/faq_cat/add"><b>Add New Category</b></a>
<br/>
<br/>
';

?>