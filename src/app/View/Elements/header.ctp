<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>
        <?php echo $title_for_layout; ?>
    </title><?php
    echo $this->Html->css('/js/jquery-ui/themes/base/jquery-ui.css');

    $javascript_options = array();
    
    echo '<script type="text/javascript">';
    	echo 'var AcePath = "'. $this->Html->toUrl('', '', '') . '";';
    echo '</script>';

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
    
    $base = 'layouts' . DS . $this->layout;
    $js_link = $this->Html->toUrlJS($base); //layout css
    if (is_file($this->Html->toPathExtended('js', $base, '.js'))) {
    	echo $this->Html->script($js_link);
    }
    
    $base = Inflector::underscore($this->Html->getCurrentController()) . DS . Inflector::underscore($this->Html->getCurrentAction()); //css by controller and action
    $js_link = $this->Html->toUrlJS($base); //layout css
    if (is_file($this->Html->toPathExtended('js', $base, '.js'))) {
    	echo $this->Html->script($js_link);
    }


    echo $this->Html->css('cake.generic');
    echo $this->Html->css('retiree.style');
    echo $this->Html->css('styles');
    echo $this->Html->css('final'); //IMPORTANT this css should be the last added css, in order to override css layouts
    echo $this->Html->css('style');
    
    if (isset($css_list)) {
    	foreach($css_list as $item) {
    		$src = $item['src'];
    		echo $this->Html->css($src);
    	}
    }
    
    $base = 'layouts' . DS . $this->layout;
    $css_link = $this->Html->toUrlCSS($base); //layout css
    if (is_file($this->Html->toPathExtended('css', $base, '.css'))) {
    	echo $this->Html->css($css_link);
    }

    $base = Inflector::underscore($this->Html->getCurrentController()) . DS . Inflector::underscore($this->Html->getCurrentAction());
    $css_link = $this->Html->toUrlCSS($base); //css by controller and action
    if (is_file($this->Html->toPathExtended('css', $base, '.css'))) {
    	echo $this->Html->css($css_link);
    }
    ?>
</head>
<body>