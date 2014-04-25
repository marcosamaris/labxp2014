<?php


elgg_register_event_handler('init', 'system', 'homemonashees_init');

function homemonashees_init() {

	// add a site navigation item
	$item = new ElggMenuItem('homemonashees', elgg_echo('homemonashees:home'), 'homemonashees');
	elgg_register_menu_item('site', $item);
		
	elgg_register_library('elgg:homemonashees', elgg_get_plugins_path() . 'homemonashees/lib/homemonashees.php');
	
	
	elgg_register_page_handler('homemonashees', 'homemonashees_hello_page_handler');
	
}


function homemonashees_hello_page_handler() {
	require_once dirname(__FILE__) . '/pages/homemonashees/hello/hello.php';
	return true;
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