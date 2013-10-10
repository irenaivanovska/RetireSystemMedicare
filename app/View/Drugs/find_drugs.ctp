<?php
	echo $this->Form->create('Drug', array('action', 'showDrugsByCountyAndZip'));
		echo $this->Form->hidden('zip_code', array('value' => $this->request->data['Drug']['zip_code']));
    	echo $this->Form->hidden('county_name', array('value' => $this->request->data['Drug']['county_name']));
    	
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
    		echo '<button name="btnFindDrugBy" id="btnFindDrugBy' . $ch .'">' . $ch . '</button>';
    		$cnt++;
    	}
        echo '</div></div>';
	echo $this->Form->submit('Find my drugs');
?>