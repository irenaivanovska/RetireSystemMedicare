<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>
        <?php echo $title_for_layout; ?>
    </title>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
    <?php echo $this-> Html -> css ('cake.generic') ?>
    <?php echo $this-> Html -> css ('retiree.style')?>
    <?php echo $this-> Html -> css ('styles')?>

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
        <li><?php echo $this->Html->link('About', array('controller' => 'home', 'action'=>'About'))?></li>
        <li><a href='#'><span>Contact</span></a></li>
        <li><?php echo $this->Html->link('FAQ', array('controller' => 'home', 'action'=>'faq'))?></li>
        <li class='last'><?php echo $this->Html->link('Log In', array('controller' => 'users', 'action'=>'login'))?></li>
    </ul>
</div>
<div id="containerFAQ">
    <div id="sidebar">
        <div style="background:#414143; width:100%;padding: 20px; border-radius: 10px 0 0 0;"><span style="color:#ff8c00; font-weight: bold; font-size: 20px;">FIND ANSWERS <br/>
        QUICKLY ! -</span><br/><br/>
        <span style="color: #ffffff; font-size: 18px; font-weight: bold;">Click a category below.</span>
        </div>
        <div id='cssmenu_v'>
            <ul>
                <li class='active'><a href='index.html'><span>First Question Category</span></a></li>
                <li><a href='#'><span>Second Question Category</span></a></li>
                <li><a href='#'><span>Third Question Category</span></a></li>
                <li class='last'><a href='#'><span>Fourth Question Category</span></a></li>
            </ul>
        </div>
    </div>
    <div id="contentFAQ">
        <?php echo $this-> fetch('content') ?>
    </div>
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
