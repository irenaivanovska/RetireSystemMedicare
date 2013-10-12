<div class="bodyContent" id="login_page">
<h2>Please Login</h2>
<div class="formDiv" style="width:300px;">
<?php 
		
echo $this->Form->create('Users');

echo'
<table cellspacing="0" cellpadding="0" border="0" class="formTable">
 <tr>
 	<td>Username:</td>
	<td><div class="input text required"><input type="text" id="UsersUsername" name="data[User][username]"/></div></td>
 </tr>
 <tr><td>Password:</td>
	<td><div class="input password required"><input type="password" id="UsersPassword" name="data[User][password]"/></div></td>
 </tr>
</table>
';
echo $this->Form->end(__('Login'));

echo '<br />
<div align="center"><a href="/users/forgot_pass">Forgot Password?</a></div>';
?>
</div>
</div> 
