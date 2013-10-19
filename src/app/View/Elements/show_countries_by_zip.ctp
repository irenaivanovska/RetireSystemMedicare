<?php
$query = '';
if ($this->request->is('post')) {
	$query = $this->request->data['ZipFind']['query'];
}

$isAjax = ($this->request->is('ajax')) ? true : false;

if (!$isAjax) {
	echo '<div id="dialog" title="Select Your Country">';
} 
	echo $this->Form->create('Drugs', array('action'=>'enterDrugs'));
	echo $this->Form->hidden('zip_code', array('value' => $query));
	echo '<div class="form-content">';
		if (isset($zipFinds)) {
			foreach ($zipFinds as $zipFind) {
				$zip =& $zipFind['ZipFind'];
				$county_name = $zip['county_name'];
				echo '<div>';
					$options = array($county_name => $county_name);
					$attributes = array(
						'legend' => false,
						'value' => $county_name,
						'label' => $county_name
					);
					echo $this->Form->radio('county_name', $options, array('multiple' => false, 'hiddenField' => false));
				echo '</div>';
			}
		}
	echo '</div>';
	echo '<div class="form_submit_line">';
		echo $this->Form->button('Next', array('type' => 'button', 'id' => 'btnEnterDrugs', 'div' => false, 'class' => 'prettyButton'));
		echo '<span> or </span>';
		echo $this->Form->button('Cancel', array('type' => 'button', 'class' => 'prettyButton', 'title' => 'close', 'role' => 'button', 'onclick' => '$(\'#dialog\').dialog(\'close\');'));
	echo '</div>';
	echo $this->form->end();
	$javascript_options = array('type' => 'text/javascript'); 
    echo $this->Html->script('/js/app/show_countries_by_zip.js', $javascript_options);
if (!$isAjax) {
	echo '</div>';
} 
?>