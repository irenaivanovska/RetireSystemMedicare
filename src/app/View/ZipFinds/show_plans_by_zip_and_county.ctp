<?php
echo '<div id="PlanListByZip">';
	echo '<div id="MatchingPlansReport">';
		echo '<span class="title">'. $count . ' Matching Plans</span>';
		echo $this->Form->button('Filter Plans', array('id' => 'btnFilterPlans', 'type' => 'button', 'class' => 'blueButton_Filter', 'value' => 'FilterPlans', 'div' => true));
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
			
			$na_rating = (int)$plan['na_rating'];
			$title = '<div class="stars">';
			for($index=1; $index <= 5; $index++) {
				$title .= '<div class="' . (($index <= $na_rating) ? 'rated' : 'unrated') . '"></div>';	
			}
			$title .= '</div>';
			echo $this->Ace->create('ZipFinds', $plan['description'], array('action' => 'commandAction', 'class' => 'PlanListForm', 'title_tags' => $title));
				echo '<div class="PlanFindItem">';
					echo '<div><b>Offered by:</b> ' . $plan['name'] . '</div>';
					echo '<div><b>Coverage included:</b></div>';
					echo '<div><b>Montly premium:</b>' . $plan['montly_premium']. '<span class="float_right">Health Deductable: ' . $plan['health_deductable'] . '</span></div>';
                    echo '<div><span class="float_right">Drug Deductable: ' . $plan['drug_deductable'] . '</span></div>';
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

echo '<div id="FilterPlansDialog" title="Filter Plans">';
	echo '<div id="FilterPlansContent">';
		if (isset($filter_by_options)) {
		  	echo $this->Form->create('ZipFinds', array('action' => 'filter', 'class' => 'FilterForm'));
				echo '<div id="FilterPlansOptions">';
					echo '<div class="options">';
						echo '<div class="title">Montly Premium</div>';
						$list_montly_premium =& $filter_by_options['montly_premium'];
						if (is_array($list_montly_premium)) {
							foreach($list_montly_premium as $id => $caption) {
								echo '<div class="options">';
									echo $this->Form->input($caption, array('name' => 'montly_premium', 'type' => 'checkbox', 'value' => $id, 'div' => false));
								echo '</div>';
							}						 
						}
					echo '</div>';
					
					echo '<div class="options">';
						echo '<div class="title">Plan Type</div>';
						$list_plan_type =& $filter_by_options['plan_type'];
						if (is_array($list_plan_type)) {
							foreach($list_plan_type as $id => $caption) {
								echo '<div class="options">';
									echo $this->Form->input($caption, array('name' => 'plan_type', 'type' => 'checkbox', 'value' => $id, 'div' => false));
								echo '</div>';
							}
						}
					echo '</div>';
					
					echo '<div class="options">';
						echo '<div class="title">Company</div>';
						echo '<div class="options">';
							echo $this->Form->input('All Carriers', array('name' => 'carriers', 'type' => 'checkbox', 'value' => '', 'div' => false));
							$list_carriers =& $filter_by_options['carrier'];
							if (is_array($list_carriers)) {
								foreach($list_carriers as $id => $caption) {
									echo $this->Form->input($caption, array('name' => 'carriers', 'type' => 'checkbox', 'value' => $id, 'div' => false));
								}
							}
						echo '</div>';
					echo '</div>';
				echo '</div>';
				echo '<div id="FilterPlansButtons">';
					echo $this->Form->button('Update', array('type' => 'button', 'id' => 'btnUpdatePlanFilter', 'div' => false, 'class' => 'prettyButton'));
				echo '</div>';
				
			echo $this->Form->end();
		}
	echo '</div>';
echo '</div>';
?>