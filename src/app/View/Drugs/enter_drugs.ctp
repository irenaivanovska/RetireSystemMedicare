<?PHP
$status = 'unchecked';

if (isset($_POST['Submit'])) {

    $selected_radio = $_POST['zips'];

    if ($selected_radio == '1') {

        $status = 'checked';

    }
    else if ($selected_radio == '2') {

        $status = 'checked';

    }
    else
    {
        $status = 'checked';
    }

}

echo '<p>By County: ' . $this->request->data['Drug']['county_name'] . '</p>';

?>
<table>
    <tr>
        <th>Enter your drugs</th>
    </tr>
    <?php
    echo $this->Form->create('Drug',array('action'=>'findDrugs'));
    	echo $this->Form->hidden('zip_code', array('value' => $this->request->data['Drug']['zip_code']));
    	echo $this->Form->hidden('county_name', array('value' => $this->request->data['Drug']['county_name']));?>

        <tr>
            <td>
                <?php
                $options =  array( '1' => 'Enter your drugs now','2'=>'Enter your drugs later','3'=>'I dont have any drugs');
                $attributes = array(
                    'legend' => false,
                    'value' => '1',
                    'default' => '1'

                );
                echo $this->Form->radio('options', $options, $attributes ); ?>
            </td>
        </tr>

</table>
<?php echo $this->Form->submit('Next');?>
