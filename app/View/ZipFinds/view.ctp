<table>
    <tr>
        <th> Country name</th>
    </tr>
    <?php
    echo $this->Form->create('ZipFind',array('action'=>'enterdrugs'));

    foreach ($zipFinds as $zipFind): ?>
    <tr>
        <td><?php

            $options =  array( $zipFind['ZipFind']['county_name'] => $zipFind['ZipFind']['county_name']);
            $attributes = array(
                'legend' => false,
                'value' => $zipFind['ZipFind']['county_name'],
            );


            //echo $this->Form->select('field', $options,  array('multiple' => true));
            echo $this->Form->radio( 'by', $options, array('multiple' => true))?>
          </td>
    </tr>
    <?php endforeach;?>
</table>
<?php echo $this->Form->end('Next')?>