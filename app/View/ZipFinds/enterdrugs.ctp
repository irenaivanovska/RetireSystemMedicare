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

?>
<table>
    <tr>
        <th>Enter your drugs</th>
    </tr>
    <?php
    echo $this->Form->create('ZipFind',array('action'=>'#'));?>


        <tr>
            <td>
                <?php
                $options =  array( '1' => 'Enter your drugs now','2'=>'Enter your drugs later','3'=>'I dont have any drugs');
                $attributes = array(
                    'legend' => false,
                    'value' => '1',
                    'default' => '1'

                );
                echo $this->Form->radio('zips', $options, $attributes ); ?>
            </td>
        </tr>

</table>
<?php echo $this->Form->submit('Next');?>
