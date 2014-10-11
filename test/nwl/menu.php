<?php
$items = array(
    array('link'=>'teaminfo.php', 'label'=>'Team information'), 
    array('link'=>'admin.php', 'label'=>'Admin page'), 
    array('link'=>'template.html', 'label'=>'CSS template'), 
    array('link'=>'examples.html', 'label'=>'Code examples')
);

$menu = '
    <ul>';
foreach ($items as $val) {
    $class = ($_SERVER['SCRIPT_NAME'] == $val['link']) ? ' class="current"' : '';
	
    $menu .= sprintf('<li><a href="%s">%s</a></li>', $val['link'], $val['label']);
}
$menu .= '
    </ul>';

 echo $menu;  