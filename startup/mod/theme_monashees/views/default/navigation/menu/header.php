<?php
/**
 * Site navigation menu
 *
 * @uses $vars['menu']['default']
 * @uses $vars['menu']['more']
 */



$default_items = elgg_extract('default', $vars['menu'], array());
$more_items = elgg_extract('more', $vars['menu'], array());

echo '<nav role="navigation" class="navigation">';
echo '<ul class="navbar-collapse collapse">';
foreach ($default_items as $menu_item) {
	echo elgg_view('navigation/menu/elements/item_header', array('item' => $menu_item));
}

if ($more_items) {
	echo '<li class="elgg-more">';

	$more = elgg_echo('more');
	echo "<a href=\"#\">$more</a>";

	echo elgg_view('navigation/menu/elements/section', array(
			'class' => 'elgg-menu elgg-menu-site elgg-menu-site-more',
			'items' => $more_items,
	));

	echo '</li>';
}
echo '</ul>';
echo '</nav>';
