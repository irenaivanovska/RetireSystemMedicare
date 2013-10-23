<?php
$isAjax = ($this->request->is('ajax')) ? true : false;

if (!$isAjax) {
	echo '<p>By County: ' . $this->request->data['Drugs']['county_name'] . '</p>';
}
echo $this->Form->create('Drugs',array('action'=>'findDrugs'));
	echo $this->Form->hidden('zip_code', array('value' => $this->request->data['Drugs']['zip_code']));
	echo $this->Form->hidden('county_name', array('value' => $this->request->data['Drugs']['county_name']));
	echo '<div class="form-content">';
		$attributes = array(
            'legend' => false,
            'multiple' => false, 
            'hiddenField' => false
        );
		echo '<div>';
			echo $this->Form->radio('options', array('1' => 'Enter your drugs now'), $attributes);
		echo '</div>';
		echo '<div>';
			echo $this->Form->radio('options', array('2' => 'Enter your drugs later'), $attributes);
		echo '</div>';
		echo '<div>';
			echo $this->Form->radio('options', array('3' => 'I dont have any drugs'), $attributes);
		echo '</div>';
      echo '</div>';
    echo '</div>';
    echo '<div class="right_box">';
    echo '<h1>Why Should I <br/> Enter My Drugs?</h1>';
    echo '<span>Text goes here about the <br/>good reasons the visitors <br/>should enter the drugs</span>';
    echo '</div>'; ?>
	<script type="text/javascript">
		function submitSelectedOption(sender) {
		    var lDrugsLink = "<?php echo $this->Form->url(array('controller' => 'Drugs', 'action' => 'findDrugs'), true); ?>";
	        var lZipFindLink = "<?php echo $this->Form->url(array('controller' => 'ZipFinds', 'action' => 'showPlansByZipAndCounty'), true); ?>";
	        var lSelValue = $("input[type='radio'][name='data[Drugs][options]']:checked").val()
			if (lSelValue > '') {
				var lLink = null;
				if (lSelValue == '1') {
					lLink = lDrugsLink;
				} else {
					lLink = lZipFindLink;
				}
				sender.form.action = lLink;
				sender.form.submit();
			}
			return true;
		}
	</script>
<?php
echo '<div class="form_submit_line">';
	echo $this->Form->button('Next', array('type' => 'button', 'id' => 'btnFindDrugs', 'div' => false, 'class' => 'prettyButton', 'onclick' => 'submitSelectedOption(this)'));
//	echo '<span> or </span>';
//	echo $this->Form->button('Cancel', array('type' => 'button', 'class' => 'prettyButton', 'title' => 'close', 'role' => 'button', 'onclick' => '$(\'#dialog\').dialog(\'close\');'));
echo '</div>';
echo $this->form->end(); 
?>	
