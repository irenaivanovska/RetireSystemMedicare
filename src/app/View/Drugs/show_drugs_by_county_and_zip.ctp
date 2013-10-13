<?php
echo '<table>';
	echo '<tr>';
		echo '<th>PlanID</th>';
		echo '<th>Contract</th>';
		echo '<th>Contract Year</th>';
		echo '<th>Level</th>';
		echo '<th>Name</th>';
		echo '<th>Type</th>';
		echo '<th>Share preferences</th>';
	echo '</tr>';
	foreach($drugs_list as $item) {
		$data =& $item['DrugModel'];
		echo '<tr>';
			echo '<td>' . $data['plan_id'] . '</td>';
			echo '<td>' . $data['contract_id'] . '</td>';
			echo '<td>' . $data['contract_year'] . '</td>';
			echo '<td>' . $data['tier_level'] . '</td>';
			echo '<td>' . $data['tier_label'] . '</td>';
			echo '<td>' . $data['tier_type_desc'] . '</td>';
			echo '<td>' . $data['cost_share_pref'] . '</td>';
		echo '</tr>';
	} 
echo '</table>'; 
//echo $this->Paginator->numbers(array('model' => 'DrugModel')); 
?>