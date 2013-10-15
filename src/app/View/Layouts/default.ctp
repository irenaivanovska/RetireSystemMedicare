<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>
        <?php echo $title_for_layout; ?>
    </title>
    <link rel="stylesheet" href="/js/jquery-ui/themes/base/jquery-ui.css" />
    <script src="/js/jquery.js"></script>
    <script src="/js/jquery-ui/ui/jquery-ui.js"></script>
	<script src="/js/jquery-ui/ui/jquery.ui.core.js"></script>
	<script src="/js/jquery-ui/ui/jquery.ui.position.js"></script>
	<script src="/js/jquery-ui/ui/jquery.ui.widget.js"></script>
	<script src="/js/jquery-ui/ui/jquery.ui.mouse.js"></script>
	<script src="/js/jquery-ui/ui/jquery.ui.draggable.js"></script>
	<script src="/js/jquery-ui/ui/jquery.ui.resizable.js"></script>
	<script src="/js/jquery-ui/ui/jquery.ui.button.js"></script>
	<script src="/js/jquery-ui/ui/jquery.ui.dialog.js"></script>

    <script>
        $(function() {
            $( "#dialog" ).dialog({
                autoOpen: false,
                title: 'Select your country',
                width: 'auto',
                position: 'center',
                resizeable: true,
                modal: true,
                draggable: true,
                closeOnEscape: true,
                closeText: 'close',
                show: {
                    effect: "blind",
                    duration: 1000
                },
                hide: {
                    effect: "explode",
                    duration: 1000
                }
            });
            $( "#opener" ).click(function() {
                $( "#dialog" ).dialog( "open" );
            });
        });
    </script>
    <?php echo $this-> Html -> css ('cake.generic') ?>
    <?php echo $this-> Html -> css ('retiree.style')?>

</head>
<body>
<div id="header">
    <h1>Retiree Support Center </h1>
    <div style="width:38%; text-align: right; color:black; font-size:60%;">brought to you by SGIA</div>
</div>
<div class="header_number">
    888-845-0449
    <button class="button"><?php echo $this->Html->link('My Account', array('controller' => 'users', 'action'=>'login'))?></button>
</div>
<div id='cssmenu'>
    <ul>
        <li class='active'><?php echo $this->Html->link('Home', array('controller' => 'home', 'action'=>'index'))?></li>
        <li><?php echo $this->Html->link('About', array('controller' => 'home', 'action'=>'about'))?></li>
        <li><a href='#'><span>Contact</span></a></li>
        <li><?php echo $this->Html->link('FAQ', array('controller' => 'home', 'action'=>'faq'))?></li>
        <li class='last'><?php echo $this->Html->link('Log In', array('controller' => 'users', 'action'=>'login'))?></li>
    </ul>
</div>
<?php
echo '<div id="container">';
	echo '<div id="headline">';
		echo $this->element('zip_find');
		echo '<div class="headline_text">We\'ll find the plan that\'s right for you!</div>';
    echo '</div>';
    echo $this->element('show_countries_by_zip');
	echo '<div id="content">';
		echo $this->fetch('content');
	echo '</div>'; ?>
    <div id="footer">
        <table>
            <tbody>
                <tr>
                    <td style="color: #ffffff;">About SGIA</td>
                    <td style="color: #ffffff;">My Account</td>
                    <td style="color: #ffffff;">About Medicare</td>
                    <td style="color: #000000;">info@domain.com</td>
                </tr>
                <tr>
                    <td style="color: #ffffff;">Employer Solutions</td>
                    <td style="color: #ffffff;">Help</td>
                    <td style="color: #ffffff;">About Medicare Supplements</td>
                    <td style="color: #000000;">888-845-0449</td>
                </tr>
                <tr>
                    <td style="color: #ffffff;">Broker Solutions</td>
                    <td style="color: #ffffff;">Contact</td>
                    <td style="color: #ffffff;">How to Pick a Policy</td>
                    <td style="color: #000000;">1234 Address Street</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="color: #000000;">City Name, State 12345</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
