<?php
echo '<div id="PlanListByZip">';
	echo '<div id="MatchingPlansReport">';
		echo '<span>Matching Plans</span>';
    echo '</div>';
    echo $this->Form->submit('Filter Plans', array('type' => 'submit', 'class' => 'blueButton_Filter', 'value' => 'FilterPlans'));
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
			echo $this->Ace->create('ZipFinds', $plan['name'], array('action' => 'commandAction', 'id' => 'PlanListForm'));
				echo '<div class="PlanFindItem">';
					echo '<div><b>Offered by:</b> ' . $plan['name'] . '</div>';
					echo '<div><b>Coverage included:</b></div>';
					echo '<div><b>Montly premium:</b>   <span class="float_right">Health Deductable:</span></div>';
                    echo '<div><span class="float_right">Drug Deductable:</span></div>';
				echo '</div>';
				echo '<div class="PlanItemMenu">';
					echo $this->Form->submit('Contact', array('type' => 'submit', 'class' => 'prettyButton', 'value' => 'contactPlan'));
					echo $this->Html->link('Add to favorites', array('controller' => 'ZipFinds', 'action' => 'addToFavorites', $plan_id, 'full_base' => true), array('class' => 'blueButton_favorites')); //echo $this->Form->submit('Add to favorites', array('type' => 'submit', 'class' => 'blueButton', 'value' => 'addPlanToFavorites'));
					echo $this->Form->submit('Plan Details', array('type' => 'submit', 'class' => 'blueButton', 'value' => 'planDetails'));
                    echo $this->Form->input('ZipFinds', array(
                                            'type' => 'checkbox',
                                            'label'=> '',
                                            'class' =>'checkButton'
                                            )
                    );
            echo $this->Form->submit('Compare', array('type' => 'submit', 'class' => 'prettyButtonCmp', 'value' => 'comparePlans'));
				echo '</div>';	
			echo $this->Ace->end();
		}
	}
echo '</div>';
?>