<?php


$boxCont='';

if($content=='account') { 

	$boxCont='<h3>MY ACCOUNT</h3>
	'.$user_name.'<br />
	';


} elseif($content=='faq') {

	$boxCont='<h3>FAQ CATEGORIES</h3>';

}

if(!empty($boxCont)) { echo '<div id="topLeft">'.$boxCont.'</div>'; }


?>