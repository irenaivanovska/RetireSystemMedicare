<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>
        <?php echo $title_for_layout; ?>
    </title><?php
    echo $this->Html->css('/js/jquery-ui/themes/base/jquery-ui.css');

    $javascript_options = array();

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
    
    $js = $this->Html->toUrlJS('layouts' . DS . $this->layout); //layout css
    if (is_file($this->Html->toPathWWW($js))) {
    	echo $this->Html->script($js);
    }
    
    $js = $this->Html->toUrlJS(Inflector::underscore($this->Html->getCurrentController()) . DS . Inflector::underscore($this->Html->getCurrentAction())); //css by controller and action
    if (is_file($this->Html->toPathWWW($js))) {
    	echo $this->Html->script($js);
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
    
    $css = $this->Html->toUrlCSS('layouts' . DS . $this->layout); //layout css
    if (is_file($this->Html->toPathWWW($css))) {
    	echo $this->Html->css($css);
    }
    
    $css = $this->Html->toUrlCSS(Inflector::underscore($this->Html->getCurrentController()) . DS . Inflector::underscore($this->Html->getCurrentAction())); //css by controller and action
    if (is_file($this->Html->toPathWWW($css))) {
    	echo $this->Html->css($css);
    }
    ?>
</head>
<body>