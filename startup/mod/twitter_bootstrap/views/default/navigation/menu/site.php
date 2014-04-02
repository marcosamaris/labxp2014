<?php
/**
 * Site navigation menu
 *
 * @uses $vars['menu']['default']
 * @uses $vars['menu']['more']
 */

$default_items = elgg_extract('default', $vars['menu'], array());
$more_items = elgg_extract('more', $vars['menu'], array());

echo '<div class="navbar navbar-inverse navbar-fixed-top">';
echo '<div class="nav nav-pills">';
echo '<div class="container">';
/*echo '<button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>';
*/
echo '<ul class="nav">';
foreach ($default_items as $menu_item) {
	echo elgg_view('navigation/menu/elements/item', array('item' => $menu_item));
}

if ($more_items) {
	echo '<li class="elgg-more dropdown">';

	$more = elgg_echo('more');
	echo '<a class="dropdown-toggle" data-toggle="dropdown" href="#">'.$more .' <b class="caret white"></b></a>';
	
	echo elgg_view('navigation/menu/elements/section', array(
		'class' => 'elgg-menu elgg-menu-site elgg-menu-site-more dropdown-menu', 
		'items' => $more_items,
	));
	
	echo '</li>';
}
echo '</ul>';


echo '<div class="nav">'.$vars['topbar'].'</div>';
echo '</div>';
echo '</div>';
echo '</div>';



