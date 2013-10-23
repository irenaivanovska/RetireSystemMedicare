<?php echo $this->element('common_header');
	echo '<div id="headline">';
		echo $this->element('zip_find');
		echo '<div class="headline_text">We\'ll find the plan that\'s right for you!</div>';
    echo '</div>';
    echo '<div id="dialog" title="Select Your Country">';
    	echo '<div id="tblCountries"></div>';
    echo '</div>';
	echo '<div id="content">';
		echo $this->fetch('content');
	echo '</div>';
echo $this->element('common_footer'); ?>