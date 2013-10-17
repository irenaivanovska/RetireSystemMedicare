<?php
echo '<table style="border: 1px solid blue" border="1px">';
	if (count($drug_item) > 0) {
		$data =& $drug_item[0]['Drugs'];
	} else {
		$data = array('drug_id' => '', 'drug_name' => '', 'dose' =>'', 'frequency' => '');
	}
	$drug_id = $data['drug_id'];
	echo '<tr>';
		echo '<td>ID</td>';
		echo '<td>' . $drug_id . '</td>';
	echo '</tr><tr>';
		echo '<td>Drug name</td>';
		echo '<td>' . $data['drug_name'] . '</td>';
	echo '</tr><tr>';
		echo '<td>Dose</td>';
		echo '<td>' . $data['dose'] . '</td>';
	echo '</tr><tr>';
		echo '<td>Frequency</td>';
		echo '<td>' . $data['frequency'] . '</td>';
	echo '</tr>';
echo '</table>'; 
?>