<?php 

$foundEnt='';

foreach ($dtls as $item){

$entDate=date('M. jS, Y',strtotime($item['faq_entry_date']));

$foundEnt.='
    <tr>
        <td>'.$item['faq_entry_id'].'</td>
        <td>'.$item['faq_question'].'</td>
		<td>'.$entDate.'</td>
		<td>'.$item['author']['name'].'</td>
        <td><a href="/faq_entry/edit/'.$item['faq_entry_id'].'">Edit/Review</a></td>
        </td>    
    </tr>';
	
} 


echo '
<h1>Pending Faq Articles</h1><br />
<table width="100%" border="0" cellspacing="0" cellpadding="3" class="dataTable">
    <tr>
        <td>Id</td>
        <td>Entry Title</td>
		<td>Submitted</td>
		<td>Author</td>
        <td>&nbsp;</td>
    </tr>
    '.$foundEnt.'
</table>
';
 
?>