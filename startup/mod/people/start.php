<?php
/**
 * Elgg people plugin
 *
 */

elgg_register_event_handler('init', 'system', 'people_init', 1);


/**
 * People init function
 */
function people_init() {
	
	// add a site navigation item
	$item = new ElggMenuItem ( 'people', elgg_echo ( 'people:people' ), 'people' );
	elgg_register_menu_item ( 'site', $item );
	elgg_register_entity_type ( 'object', 'people' );

	//
	elgg_register_page_handler ( 'people', 'people_page_handler' );
}



function people_page_handler($pages) {
    $user = elgg_get_logged_in_user_entity ();
	
	// index.php can do whatever it needs to for loggedIn or loggedOut
	
	if (($user->permission == 'allowed') || elgg_is_admin_logged_in ()) {
	    
	    if (! include_once (elgg_get_plugins_path () . 'people/pages/people/index.php')) {
	        return false;
	    }
	} else if (! include_once (dirname ( __FILE__ ) . '/pages/home/register.php')) {
	
	    return false;
	}
	
	return true;
}

