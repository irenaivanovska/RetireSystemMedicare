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

echo '<p>By County: ' . $this->request->data['Drugs']['county_name'] . '</p>';

?>
<table>
    <tr>
        <th>Enter your drugs</th>
    </tr>
    <?php
    echo $this->Form->create('Drugs',array('action'=>'findDrugs'));
    	echo $this->Form->hidden('zip_code', array('value' => $this->request->data['Drugs']['zip_code']));
    	echo $this->Form->hidden('county_name', array('value' => $this->request->data['Drugs']['county_name']));?>
        <tr>
            <td>
                <?php
                $options = array(
                	'1' => 'Enter your drugs now',
                	'2' => 'Enter your drugs later',
                	'3' => 'I dont have any drugs'
                );
                $attributes = array(
                    'legend' => false,
                    'value' => '',
                );
                echo $this->Form->radio('options', $options, $attributes); 
                ?>
            </td>
        </tr>

</table>
<script type="text/javascript">
	function submitSelectedOption(sender) {
	    var lDrugsLink = "<?php echo $this->Form->url(array('controller' => 'Drugs', 'action' => 'findDrugs'), true); ?>";
        var lZipFindLink = "<?php echo $this->Form->url(array('controller' => 'ZipFinds', 'action' => 'showPlansByZipAndCounty'), true); ?>";
        var lSelValue = $("input[type='radio'][name='data[Drugs][options]']:checked").val()
		if (lSelValue > '') {
			var lLink = null;
			if (lSelValue == '1') {
				lLink = lDrugsLink;
			} else {
				lLink = lZipFindLink;
			}
			sender.form.action = lLink;
			sender.form.submit();
		}
		return true;
	}
</script>
<?php echo $this->Form->button('Next', array('type' => 'button', 'onclick' => 'submitSelectedOption(this)'));?>
