<?php 
echo '<div id="quote" class="get_quote">';
	echo '<h2>Get a Quote</h2>';
	echo '<p>Medicare & Supplements</p>';
    echo $this->Form->create('ZipFind', array('action'=> 'view' ));
    echo $this->Form->input('query', array('type'=>'text', 'label'=>'Zip Code'));
    echo $this->Form->button('Find Plans', array('type' => 'button', 'id' => 'opener'));
    echo $this->Form->end(); //('Find Plans');	
    
    /* $ajax->form(array('type' => 'post',
    	'options' => array(
    		'model' => 'ZipFind',
    		'update' => 'dialog',
    		'url' => array(
    			'controller' => 'ZipFinds',
    			'action' => 'view'
    		)
    	)
    );*/
echo '</div>'; ?>