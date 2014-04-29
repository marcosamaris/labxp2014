<?php


elgg_register_event_handler('init', 'system', 'homemonashees_init');

function homemonashees_init() {

	// add a site navigation item
	$item = new ElggMenuItem('homemonashees', elgg_echo('homemonashees:home'), 'homemonashees');
	elgg_register_menu_item('site', $item);

	elgg_register_library('elgg:homemonashees', elgg_get_plugins_path() . 'homemonashees/lib/homemonashees.php');


	elgg_register_action("homemonashees/save", elgg_get_plugins_path() . "homemonashees/actions/homemonashees/save.php");
	elgg_register_page_handler('homemonashees', 'homemonashees_page_handler');
	
}


function homemonashees_page_handler($segments) {
	$page = $segments[0];
	if($page == ''){
		$page = 'add';
	}
	if ($page == 'add') {
		include elgg_get_plugins_path() . 'homemonashees/pages/homemonashees/add.php';
		return true;
	}
	return false;
}


/*function homemonashees_page_handler() {
 $params = array(
 		'title' => 'Hello world!',
 		'content' => 'This is my first plugin.',
 		'filter' => '',
 );

$body = elgg_view_layout('content', $params);

echo elgg_view_page('Hello', $body);
}*/