<?php 

if ($logged_in){ 


if ($role === "member") {		 
		// <a href="/users/member_contact">Contact Site</a>
		 
$navLinks='
<ul>
<li><a href="/dash"><b>My Account</b></a></li>
<li><a href="/users/logout" class="logout">Logout</a></li>
</ul>
';
		
		//echo '<br />';
		
} elseif ($role === "admin") {
		
$navLinks='
<ul>
<li><a href="/dash"><b>My Account</b></a></li>
<li><a href="/faq_cat/admin">FAQ Categories</a></li>
<li><a href="/reports">Reports</a></li>
<li><a href="/users/logout" class="logout">Logout</a></li>
</ul>
';
		
	}
	
	echo '
		 <div id="myAccount">
			'.$navLinks.'
     	</div>
     	';
	
	
} else {

echo '<div class="loginButton"><a href="/users/login">Login</a></div>';

}
?>