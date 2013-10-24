<?php

$navLinks='';

if(!empty($userInfo)) { 

	$info=$userInfo['Users'];

	
	if($role=='admin') { 
	
		$navLinks='
		<ul>
		<li><a href="/faq_cat/admin">FAQ Categories</a></li>
		<li><a href="/reports">Reports</a></li>
		<li><a href="/users/logout" class="logout">Logout</a></li>
		</ul>
		';

	}
	
	
}

echo '<h1>My Account</h1>
'.$navLinks.'
';

?>