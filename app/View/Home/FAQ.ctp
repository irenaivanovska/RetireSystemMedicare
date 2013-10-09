<div id="quoteFAQ" class="get_quoteFAQ">
    <h2>Get a Quote for Medicare & Supplements</h2>
    <?php
    echo $this->Form->create('ZipFinds', array('action'=> 'view' ));?>
    <br/>
    <?php echo $this->Form->input('query', array('type'=>'text', 'label'=>'Zip Code'));
    echo $this->Form->end('Find Plans');?>
</div>
    <br/><br/>
    <div>
        <h2>Questions relating to Category 1</h2>
        <p>Questions relating to Category 1 is clicked</p>
        <p>Another question from category 1</p>
        <p>Another question from category 1</p>
    </div>