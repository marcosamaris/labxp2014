<?php

elgg_register_event_handler ( 'init', 'system', 'white_black_list_init' );

function white_black_list_init() {
	
	// add a site navigation item
	$item = new ElggMenuItem ( 'home', elgg_echo ( 'home:home' ), 'home' );
	elgg_register_menu_item ( 'site', $item );
	elgg_register_entity_type ( 'object', 'home' );

	
	// for add comments and actions for each post
	elgg_register_plugin_hook_handler ( 'register', 'menu:entity', 'elgg_post_menu_setup' );
	
	// for remove the activity page
	elgg_unregister_page_handler ( 'activity' );
	elgg_unregister_menu_item ( 'site', 'activity' );
	elgg_register_page_handler ( 'activity', 'core_twocan_page_handler' );
}