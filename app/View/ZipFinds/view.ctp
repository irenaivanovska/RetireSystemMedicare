<table>
    <tr>
        <th> Country name</th>
    </tr>
    <?php
    echo $this->Form->create('DrugListByPlans', array('action'=>'enterdrugs'));
    echo $this->Form->hidden('zip_code', array('value' => $this->request->data['ZipFind']['query']));

    foreach ($zipFinds as $zipFind): ?>
    <tr>
        <td><?php

            $options =  array( $zipFind['ZipFind']['county_name'] => $zipFind['ZipFind']['county_name']);
            $attributes = array(
                'legend' => false,
                'value' => $zipFind['ZipFind']['county_name'],
            );

            echo $this->Form->radio('by_county_name', $options, array('multiple' => true))?>
          </td>
    </tr>
    <?php endforeach;?>
</table>
<?php echo $this->Form->end('Next')?>