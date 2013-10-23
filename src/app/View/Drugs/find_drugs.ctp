<?php
echo '<div class="content_drugs">';
	echo '<div class="title_blue">Enter Your Drugs</div>';
	echo '<p>Please enter your prescription drugs. This will help us to estimate your costs and allow you to see which plans cover';
	echo ' your drugs. The doesn\'t allow pricing for over the counter drugs of diabetic supplies (e.g. test strips, lancets';
	echo ' needles). For more information, you may contact the plan.</p>';
	echo '<div class="acebox">';
		echo '<div style="float: left; clear: none">';
			echo $this->Form->create('Drugs', array('action' => 'findDrugs', 'class' => 'blueForm'));
			echo '<div class="ll">';
				echo $this->Form->hidden('zip_code', array('value' => $zip_code));
		    	echo $this->Form->hidden('county_name', array('value' => $county_name));
		    	
		    	echo '<div>';
		    		echo '<h2>Drug name</h2>';
		    		echo $this->Form->input('drug_name', array('type' => 'text',  'value' => '', 'label' => false, 'div' => false, 'required' => false));
		    		echo $this->Form->submit('Find my drugs', array('type' => 'submit', 'div' => false, 'class' => 'prettyButton'));
		    	echo '</div>';
		    	
		    	$cnt = 0;
	    		echo '<div><p>Or browse a list of drugs A-Z</p></div>';
	    		echo '<div>';
			    	for($index = 65; $index <= 90; $index++) {
			    		$ch = chr($index);
			    		if ($cnt > 12) { 
			    			echo '</div><div>';
			    			$cnt = 0;
			    		}
			    		echo '<button type="button" name="btnFindDrugBy" id="btnFindDrugBy' . $ch .'" onclick="document.getElementById(\'DrugsDrugName\').value=\'' . $ch . '\'; this.form.submit(); ">' . $ch . '</button>';
			    		$cnt++;
			    	}
			    echo '</div>';
			echo '</div>';
			echo $this->Form->end();
		echo '</div>';
		
		echo '<div style="float: right; clear: none">';
			echo $this->Ace->create('Drugs', 'Save/Retrieve My Drug List', array('action' => 'saveDrugList'));
				echo '<div class="titled-form-row">';
					echo $this->Form->input('username', array('type' => 'text', 'value' => '', 'label' => 'Email', 'div' => false));
				echo '</div>';
					echo '<div class="titled-form-row">';
					echo $this->Form->input('passwd', array('type' => 'password', 'value' => '', 'label' => 'Password', 'div' => false));
				echo '</div>';
				echo '<div class="titled-form-row middle-buttons">';
					echo $this->Form->submit('Find Drug List', array('type' => 'submit', 'div' => false, 'class' => 'prettyButton'));
					echo $this->Form->submit('Retrieve Drug List', array('type' => 'submit', 'div' => false, 'class' => 'prettyButton'));
				echo '</div>';
			echo $this->Ace->end();
		echo '</div>';
	echo '</div>';
echo '</div>';

echo '<div class="list_drugs">';        
	echo '<p class="blue_header">Current Drug List > total drugs listed:</p>';
	echo '<table>';
	    echo '<tr class="black_header">';
			echo '<th>Drug name</th>';
			echo '<th>Quantity</th>';
			echo '<th>Frequency/Pharmacy</th>';
			echo '<th>Generic</th>';
			echo '<th>&nbsp;</th>';
		echo '</tr>';
		foreach($drugs_list as $item) {
			$data =& $item['Drugs'];
			$drug_id = $data['drug_id'];
			echo '<tr class="black_border">';
				echo '<td>' . $data['drug_name'] . '</td>';
				echo '<td>' . $data['quantity'] . '</td>';
				echo '<td>' . $data['frequency'] . '</td>';
				echo '<td>' . ((int)$data['generic'] == 1) ? 'yes' : 'no') . '</td>';
				echo '<td><a href="/drugs/showDetail/' . $drug_id . '">More...</a></td>';
			echo '</tr>';
		} 
	echo '</table>'; 
	//echo $this->Paginator->numbers(array('model' => 'DrugModel'));
echo '</div>';

?>
