<div id="quote" class="get_quote">
    <h2>Get a Quote</h2>
    <p>Medicare & Supplements</p>
    <?php
    echo $this->Form->create('ZipFind', array('action'=> 'view' ));
    echo $this->Form->input('query', array('type'=>'text', 'label'=>'Zip Code'));
    echo $this->Form->end('Find Plans');?>
    <div id="dialog" title="Select Your Country">
        <table>
            <tr>
                <th> Country name</th>
            </tr>



        </table>
        <?php echo $this->Form->end('Next');?>
    </div>
    <button id="opener">Find Plans</button>
</div>