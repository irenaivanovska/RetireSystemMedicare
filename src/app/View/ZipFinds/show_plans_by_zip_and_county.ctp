<?php
$query = '';
if ($this->request->is('post')) {
	$query = $this->request->data['planItem']['query'];
}
		
echo '<table>';
	echo '<tr>';
		echo '<th>Name</th>';
		echo '<th>Descsription</th>';
		echo '<th>Web address</th>';
		echo '<th>Condition</th>';
		echo '<th>Zip code</th>';
		echo '<th>County name</th>';
	echo '</tr>';
	if (isset($planFinds)) {
		foreach ($planFinds as $planItem) {
			$plan =& $planItem['planItem'];
			echo '<tr>';
			    echo '<td>' . $plan['name'] . '</td>';
			    echo '<td>' . $plan['web_addr'] . '</td>';
			    echo '<td>' . $plan['textcond'] . '</td>';
			    echo '<td>' . $plan['zip_code'] . '</td>';			    
				echo '<td>' . $plan['county_name'] . '</td>';
				echo '<td>' . $plan['state_name'] . '</td>';
			echo '</tr>';
		}
	}
echo '</table>';
?>