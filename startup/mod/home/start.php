<?php

elgg_register_event_handler ( 'init', 'system', 'home_init' );

function home_init() {
	
	// add a site navigation item
	$item = new ElggMenuItem ( 'home', elgg_echo ( 'home:home' ), 'home' );
	elgg_register_menu_item ( 'site', $item );
	elgg_register_entity_type ( 'object', 'home' );
	
	elgg_register_page_handler ( 'home', 'home_page_handler' );
	elgg_register_action ( "home/save", elgg_get_plugins_path () . "home/actions/home/save.php" );
	elgg_register_action ( 'home/delete', elgg_get_plugins_path () . "home/actions/home/delete.php" );
	register_plugin_hook ( 'index', 'system', 'home_index' );
	
	// for add comments and actions for each post
	elgg_register_plugin_hook_handler ( 'register', 'menu:entity', 'elgg_post_menu_setup' );
	
	// for remove the activity page
	elgg_unregister_page_handler ( 'activity' );
	elgg_unregister_menu_item ( 'site', 'activity' );
	elgg_register_page_handler ( 'activity', 'core_twocan_page_handler' );
}

function home_index($hook, $type, $return, $params) {
	if ($return == true) {
		return $return;
	}
	// index.php can do whatever it needs to for loggedIn or loggedOut
	if (! include_once (dirname ( __FILE__ ) . "/pages/home/index.php")) {
		return false;
	}
	return true;
}

function elgg_post_menu_setup($hook, $type, $value, $params) {
	$handler = elgg_extract ( 'handler', $params, false );
	if ($handler != 'home') {
		return $value;
	}
	
	foreach ( $value as $index => $item ) {
		$name = $item->getName ();
		if ($name != 'delete') {
			unset ( $value [$index] );
		}
	}
	$entity = $params ['entity'];
	
	$options = array (
			'name' => 'comment',
			'href' => "#comments-add-{$entity->getGUID()}",
			'text' => elgg_view_icon ( 'speech-bubble' ),
			'title' => elgg_echo ( 'comment:this' ),
			'rel' => 'toggle',
			'priority' => 50 
	);
	
	$value [] = ElggMenuItem::factory ( $options );
	
	return $value;
}


function home_page_handler($segments) {
	
	if($segments[0] == 'register'){
		include elgg_get_plugins_path () . 'home/pages/home/register.php';
	}
	else{
	include elgg_get_plugins_path () . 'home/pages/home/index.php';
	}
	
	return true;
}
