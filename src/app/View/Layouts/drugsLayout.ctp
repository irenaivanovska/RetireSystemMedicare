<?php echo $this->element('common_header');
echo '<div id="content">';
echo $this->fetch('content');
echo '</div>';
echo $this->element('common_footer'); ?>