<?php
if (isset($zipFinds)) {
	echo '<div id="dialog" title="Select Your Country">'; 
		echo $this->Form->create('Drugs', array('action'=>'enterDrugs'));
		echo $this->Form->hidden('zip_code', array('value' => $this->request->data['ZipFind']['query']));
		echo '<table>';
			echo '<tr>';
				echo '<th>Country name</th>';
			echo '</tr>';
			foreach ($zipFinds as $zipFind) {
				$zip =& $zipFind['ZipFind'];
				$county_name = $zip['county_name'];
				echo '<tr>';
					echo '<td>';
						$options = array($county_name => $county_name);
						$attributes = array(
							'legend' => false,
							'value' => $county_name,
						);
						echo $this->Form->radio('county_name', $options, array('multiple' => true));
					echo '</td>';
				echo '</tr>';
			}
		echo '</table>';
		echo $this->Form->end('Next');
	echo '</div>'; 
} ?>