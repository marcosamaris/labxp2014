<?php


elgg_register_event_handler('init', 'system', 'homemonashees_init');

function homemonashees_init() {
	
	// Replace the default index page
	//elgg_register_plugin_hook_handler('index', 'system', 'new_index');
	
	
	// add a site navigation item
	$item = new ElggMenuItem('homemonashees', elgg_echo('homemonashees:home'), 'homemonashees');
	elgg_register_menu_item('site', $item);

	elgg_register_library('elgg:homemonashees', elgg_get_plugins_path() . 'homemonashees/lib/homemonashees.php');

	
	
	elgg_register_page_handler('homemonashees', 'homemonashees_page_handler');
	elgg_register_action("homemonashees/save", elgg_get_plugins_path() . "homemonashees/actions/homemonashees/save.php");



	//elgg_register_action("homemonashees/save", elgg_get_plugins_path() . "homemonashees/actions/homemonashees/save.php");
	//elgg_register_page_handler('homemonashees', 'homemonashees_page_handler');

	
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



/*function homemonashees_hello_page_handler($segments) {
	if ($segments[0] == 'add') {
		include elgg_get_plugins_path() . 'homemonashees/pages/homemonashees/add.php';
		return true;
	}
	return false;
}



function homemonashees_page_handler($segments) {
	if ($segments[0] == 'add') {
		include elgg_get_plugins_path() . 'homemonashees/pages/homemonashees/add.php';
		return true;
	}
	return false;
}

/*function new_index() {
	return !include_once(dirname(__FILE__) . "/pages/index.php");

/*function homemonashees_page_handler() {
 $params = array(
 		'title' => 'Hello world!',
 		'content' => 'This is my first plugin.',
 		'filter' => '',
 );

$body = elgg_view_layout('content', $params);

echo elgg_view_page('Hello', $body);

}*/