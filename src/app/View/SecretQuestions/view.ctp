<div class="secretQuestions view">
<h2><?php echo __('Secret Question'); ?></h2>
	<dl>
		<dt><?php echo __('Secret Question Id'); ?></dt>
		<dd>
			<?php echo h($secretQuestion['SecretQuestion']['secret_question_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Secret Question'); ?></dt>
		<dd>
			<?php echo h($secretQuestion['SecretQuestion']['secret_question']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Secret Question'), array('action' => 'edit', $secretQuestion['SecretQuestion']['secret_question_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Secret Question'), array('action' => 'delete', $secretQuestion['SecretQuestion']['secret_question_id']), null, __('Are you sure you want to delete # %s?', $secretQuestion['SecretQuestion']['secret_question_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Secret Questions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Secret Question'), array('action' => 'add')); ?> </li>
	</ul>
</div>
