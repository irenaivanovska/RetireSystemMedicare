<div class="secretQuestions index">
	<h2><?php echo __('Secret Questions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('secret_question_id'); ?></th>
			<th><?php echo $this->Paginator->sort('secret_question'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($secretQuestions as $secretQuestion): ?>
	<tr>
		<td><?php echo h($secretQuestion['SecretQuestion']['secret_question_id']); ?>&nbsp;</td>
		<td><?php echo h($secretQuestion['SecretQuestion']['secret_question']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $secretQuestion['SecretQuestion']['secret_question_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $secretQuestion['SecretQuestion']['secret_question_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $secretQuestion['SecretQuestion']['secret_question_id']), null, __('Are you sure you want to delete # %s?', $secretQuestion['SecretQuestion']['secret_question_id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Secret Question'), array('action' => 'add')); ?></li>
	</ul>
</div>
