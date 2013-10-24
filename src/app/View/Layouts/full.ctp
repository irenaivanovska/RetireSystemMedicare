<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title_for_layout; ?></title>
<script type="text/javascript" src="/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="/js/java.js"></script>
<?php 
//echo $this->fetch('meta');
//$this->fetch('css')
echo $this->Html->css('style')."\n";
echo $this->fetch('script')."\n";
?>
</head>
<body>
<div id="wrapper">
    <div id="top">
        <div id="header">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><h1>Retiree Support Center</h1>
            	<div class="sub-title">brought to you by SGIA</div></td>
            <td><span class="h1">888-845-0449</span></td>
            <td><?php echo $this->element('mini_dash'); ?></td>
          </tr>
        </table>
        </div>
        <div id="navbar">
        	<div id="navlinks">
                <ul>
                    <li class="fli"><a href="/">Home</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/contact">Contact</a></li>
                    <li><a href="/faq">FAQ</a></li>
                </ul>    
           <div class="clear"></div>
           </div>
        </div>
    </div>
    <div id="full_container">
    	<div id="content">
			<?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>
        </div>
        <div id="footer">
        <table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>links</td>
            <td>links</td>
            <td>links</td>
            <td>info</td>
          </tr>
        </table>
        </div>	
	</div>
</div>
</body>
</html>