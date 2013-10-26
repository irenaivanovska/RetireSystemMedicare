<?php
echo '<div id="PlanListByZip">';
	echo '<div id="MatchingPlansReport">';
		echo '<span class="title">'. $count . ' Matching Plans</span>';
		echo $this->Form->button('Filter Plans', array('type' => 'button', 'class' => 'blueButton_Filter', 'value' => 'FilterPlans', 'div' => true));
		echo '<span class="rows_per_page">Showing ' . $rows_per_page . ' of ' . $count . ' Plans</span>';
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
			echo '</tr>';*/
			$title = '<div class="stars">';
			for($index=0; $index < 5; $index++) {
				$title .= '<div></div>';	
			}
			$title .= '</div>';
			echo $this->Ace->create('ZipFinds', $plan['name'], array('action' => 'commandAction', 'class' => 'PlanListForm', 'title_tags' => $title));
				echo '<div class="PlanFindItem">';
					echo '<div><b>Offered by:</b> ' . $plan['name'] . '</div>';
					echo '<div><b>Coverage included:</b></div>';
					echo '<div><b>Montly premium:</b>   <span class="float_right">Health Deductable:</span></div>';
                    echo '<div><span class="float_right">Drug Deductable:</span></div>';
				echo '</div>';
				echo '<div class="PlanItemMenu">';
					echo $this->Form->submit('Contact', array('type' => 'submit', 'class' => 'prettyButton', 'value' => 'contactPlan'));
					//echo $this->Html->link('Add to favorites', array('controller' => 'ZipFinds', 'action' => 'addToFavorites', $plan_id, 'full_base' => true, 'class' => 'blueButton')); 
					echo $this->Form->submit('Add to favorites', array('type' => 'button', 'class' => 'blueButton', 'value' => 'addPlanToFavorites', 'onclick' => 'Ace.PlanList.addToFavorites(' . $plan_id .')' ));
					echo $this->Form->submit('Plan Details', array('type' => 'submit', 'class' => 'blueButton', 'value' => 'planDetails'));
					echo $this->Form->submit('Compare', array('type' => 'submit', 'class' => 'prettyButton', 'value' => 'comparePlans'));
				echo '</div>';	
			echo $this->Ace->end();
		}
	}
echo '</div>';
echo '<div id="AceDialog" title="Information">';
	echo '<div id="AceDialogContent"></div>';
echo '</div>';
?>