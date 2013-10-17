<?php
echo '<table>';
	echo '<tr>';
		echo '<th>ID</th>';
		echo '<th>Name</th>';
		echo '<th>Descsription</th>';
		echo '<th>Web address</th>';
		echo '<th>Condition</th>';
		echo '<th>Zip code</th>';
		echo '<th>County name</th>';
		echo '<th></th>';
	echo '</tr>';
	if (isset($planFinds)) {
		foreach ($planFinds as $planItem) {
			$plan =& $planItem['ZipFind'];
			$plan_id = $plan['plan_id'];
			echo '<tr>';
				echo '<td>' . $plan_id . '</td>';
			    echo '<td>' . $plan['name'] . '</td>';
			    echo '<td>' . $plan['web_addr'] . '</td>';
			    echo '<td>' . $plan['textcond'] . '</td>';
			    echo '<td>' . $plan['zip_code'] . '</td>';			    
				echo '<td>' . $plan['county_name'] . '</td>';
				echo '<td>' . $plan['state_name'] . '</td>';
				echo '<td>' . $this->Html->link('Add to favorites', array('controller' => 'ZipFinds', 'action' => 'addToFavorites', $plan_id, 'full_base' => true)) . '</td>';
			echo '</tr>';
		}
	}
echo '</table>';
?>