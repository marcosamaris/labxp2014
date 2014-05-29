<?php

elgg_register_event_handler('init', 'system', 'advisor_init');

function advisor_init() {
    //register actions
    //set up pretty urls
    //add menu items
    //etc.

    $item = new ElggMenuItem('advisor', elgg_echo('advisor:advisor'), 'advisor');
	elgg_register_menu_item('site', $item);
	//	elgg_register_entity_type('object', 'advisor');

	elgg_register_page_handler('advisor', 'advisor_page_handler');
}
 


function advisor_page_handler() {	
	
	include elgg_get_plugins_path() . 'advisor/pages/advisor/advisor.php';
	
	return true;	
}


