<?php
	echo '<div class="acebox">';
		echo '<h1>Enter Your Drugs</h1>';
		echo '<p>Please enter your prescription drugs. This will help us to estimate your costs and allow you to see which plans cover';
		echo ' your drugs. The doesn\'t allow pricing for over the counter drugs of diabetic supplies (e.g. test strips, lancets';
		echo ' needles). For more information, you may contact the plan.</p>';
		
		echo $this->Form->create('Drugs', array('action' => 'showDrugsByCountyAndZip', 'class' => 'blueForm'));
			echo $this->Form->hidden('zip_code', array('value' => $this->request->data['Drugs']['zip_code']));
	    	echo $this->Form->hidden('county_name', array('value' => $this->request->data['Drugs']['county_name']));
	    	
	    	echo '<div class="input text">';
	    		echo '<label for="drug_name">Name of Drug:</label>';
	    		echo $this->Form->input('drug_name', array('type' => 'text',  'value' => ''));
	    	echo '<div>';
	    	
	    	$cnt = 0;
	    	echo '<div><div>';
	    	for($index = 65; $index <= 90; $index++) {
	    		$ch = chr($index);
	    		if ($cnt > 12) { 
	    			echo '</div><div>';
	    			$cnt = 0;
	    		}
	    		echo '<button type="button" name="btnFindDrugBy" id="btnFindDrugBy' . $ch .'" onclick="document.getElementById(\'DrugsDrugName\').value=\'' . $ch . '\'; this.form.submit(); ">' . $ch . '</button>';
	    		$cnt++;
	    	}
	        echo '</div></div>';
		echo $this->Form->submit('Find my drugs');
	echo '</div>';
?>