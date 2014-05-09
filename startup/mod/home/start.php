<?php


elgg_register_event_handler('init', 'system', 'home_init');

function home_init() {
	
	// add a site navigation item
	$item = new ElggMenuItem('home', elgg_echo('home:home'), 'home');
	elgg_register_menu_item('site', $item);

	
	elgg_register_page_handler('home', 'home_page_handler');
	elgg_register_action("home/save", elgg_get_plugins_path() . "home/actions/home/save.php");

}


function home_page_handler($segments) {

	switch ($segments[0]) {
		case 'add':
			default:
			include elgg_get_plugins_path() . 'home/pages/home/add.php';
			break;
	
		case 'all':

			include elgg_get_plugins_path() . 'home/pages/home/all.php';
			break;
	}
	
	return true;
	
	
}
