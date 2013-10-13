<?php
echo '<table>';
	echo '<tr>';
		echo '<th>ID</th>';
		echo '<th>Drug name</th>';
		echo '<th>Dose</th>';
		echo '<th>Frequency</th>';
		echo '<th>&nbsp;</th>';
	echo '</tr>';
	foreach($drugs_list as $item) {
		$data =& $item['Drugs'];
		$drug_id = $data['drug_id'];
		echo '<tr>';
			echo '<td>' . $drug_id . '</td>';
			echo '<td>' . $data['drug_name'] . '</td>';
			echo '<td>' . $data['dose'] . '</td>';
			echo '<td>' . $data['frequency'] . '</td>';
			echo '<td><a href="action=showdetail&drug_id=' . $drug_id . '">More...</a></td>';
		echo '</tr>';
	} 
echo '</table>'; 
echo $this->Paginator->numbers(array('model' => 'DrugModel')); 
?>