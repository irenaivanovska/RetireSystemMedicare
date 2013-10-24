<?php
echo '<div id="PlanListByZip">';
	echo '<div id="MatchingPlansReport">';
		echo '<span>Matching Plans</span>';
	echo '</div>';
	if (isset($planFinds)) {
		foreach ($planFinds as $planItem) {
			$plan =& $planItem['ZipFind'];
			$plan_id = $plan['plan_id'];
			/*echo '<tr>';
				echo '<td>' . $plan_id . '</td>';
			    echo '<td>' . $plan['name'] . '</td>';
			    echo '<td>' . $plan['web_addr'] . '</td>';
			    echo '<td>' . $plan['textcond'] . '</td>';
			    echo '<td>' . $plan['zip_code'] . '</td>';			    
				echo '<td>' . $plan['county_name'] . '</td>';
				echo '<td>' . $plan['state_name'] . '</td>';
				echo '<td>' . $this->Html->link('Add to favorites', array('controller' => 'ZipFinds', 'action' => 'addToFavorites', $plan_id, 'full_base' => true)) . '</td>';
			echo '</tr>';*/
			echo $this->Ace->create('ZipFinds', $plan['name'], array('action' => 'commandAction', 'class' => 'PlanListForm'));
				echo '<div class="PlanFindItem">';
					echo '<div><b>Offered by:</b> ' . $plan['name'] . '</div>';
					echo '<div><b>Coverage included</b></div>';
					echo '<div><b>Montly premium</b></div>';
				echo '</div>';
				echo '<div class="PlanItemMenu">';
					echo $this->Form->submit('Contact', array('type' => 'submit', 'class' => 'prettyButton'));
					echo $this->Form->submit('Add to favorites', array('type' => 'submit', 'class' => 'prettyButton'));
					echo $this->Form->submit('Plan Details', array('type' => 'submit', 'class' => 'prettyButton'));
					echo $this->Form->submit('Compare', array('type' => 'submit', 'class' => 'prettyButton'));
				echo '</div>';	
			echo $this->Ace->end();
		}
	}
echo '</div>';
?>