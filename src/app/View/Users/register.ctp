<?php


$termsCondit=<<<EOT
<div id="toc">
<div>
    <h2>Terms and Conditions</h2>
<p> Your  usage of this website is subject to the following terms and  conditions. By creating an account on this site you agree to the  following:</p>

<br />
<a href="javascript:" onclick="hide('toc')"><b>Close Window</b></a>
<br />
</div>
</div>
EOT;


?>
<div class="bodyContent" id="reg_page">
<br /><?php echo $termsCondit; ?>
<h2>Create a Login</h2>
<div class="formDiv" style="width:430px;">
<?php
echo $this->Form->create('Users',array('onsubmit'=>'return vf_join(this);')); 
	echo '
	<table border="0" cellspacing="0" cellpadding="0" class="formTable">
	  <tr><td width="120">Username:</td><td>'.$this->Form->input('username', array('label' => false)).'</td></tr>
	  <tr><td>Password:</td><td>'.$this->Form->input('password', array('label' => false)).'</td></tr>
   	  <tr><td>Confirm Password:</td><td>'.$this->Form->input('password_confirmation', array('label' => false, 'type' => 'password')).'</td></tr>
	  <tr><td colspan="2">&nbsp;</td></tr>
	  <tr><td>TERMS: (required)</td><td>'.$this->Form->checkbox('terms',array('value' => 1)).'<a href="javascript:" onclick="show(\'toc\')">I Agree to the Terms</a></td></tr>
	</table>
	';
	 echo $this->Form->end(__('Submit'));
?> 
</div>
</div>
