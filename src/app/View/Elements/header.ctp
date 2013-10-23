<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>
        <?php echo $title_for_layout; ?>
    </title><?php
    echo $this->Html->css('/js/jquery-ui/themes/base/jquery-ui.css');

    $javascript_options = array(/*'type' => 'text/javascript'*/);

    echo $this->Html->script('/js/jquery.js', $javascript_options);
    echo $this->Html->script('/js/jquery-ui/ui/jquery-ui.js', $javascript_options);
    echo $this->Html->script('/js/jquery-ui/ui/jquery.ui.core.js', $javascript_options);
    echo $this->Html->script('/js/jquery-ui/ui/jquery.ui.position.js', $javascript_options);
    echo $this->Html->script('/js/jquery-ui/ui/jquery.ui.widget.js', $javascript_options);
    echo $this->Html->script('/js/jquery-ui/ui/jquery.ui.mouse.js', $javascript_options);
    echo $this->Html->script('/js/jquery-ui/ui/jquery.ui.draggable.js', $javascript_options);
    echo $this->Html->script('/js/jquery-ui/ui/jquery.ui.resizable.js', $javascript_options);
    echo $this->Html->script('/js/jquery-ui/ui/jquery.ui.button.js', $javascript_options);
    echo $this->Html->script('/js/jquery-ui/ui/jquery.ui.dialog.js', $javascript_options);

    echo $this->Html->script('/js/global.js', $javascript_options);


    echo $this->Html->css('cake.generic');
    echo $this->Html->css('retiree.style');
    echo $this->Html->css('final'); //IMPORTANT this css should be the last added css, in order to override css layouts
    
    if (isset($css_list)) {
    	foreach($css_list as $item) {
    		$src = $item['src'];
    		echo $this->Html->css($src);
    	}
    }
    
    $css = $this->Html->toUrlCSS($this->Html->getCurrentController() . DS . $this->Html->getCurrentAction());
    if (is_file($this->Html->toPathCSS($css))) {
    	echo $this->Html->css($css);
    }
    ?>
</head>
<body>