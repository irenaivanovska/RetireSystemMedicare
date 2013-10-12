<div class="secretQuestions form">
<?php echo $this->Form->create('SecretQuestion'); ?>
	<fieldset>
		<legend><?php echo __('Add Secret Question'); ?></legend>
	<?php
		echo $this->Form->input('secret_question');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Secret Questions'), array('action' => 'index')); ?></li>
	</ul>
</div>
