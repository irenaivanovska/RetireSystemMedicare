
<form method="post" action="add">
<label>Name</label>
<?php echo $this->Form->input('FaqEntry.faq_question', array('label' => FALSE)); ?>
<label>East(value must be in decimal)</label>
<input type="submit" name="submit"value="submit">

<?php $this->Form->end(); ?>