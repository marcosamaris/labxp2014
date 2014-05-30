<?php
function advisors_init() {	
	// add a site navigation item
	$item = new ElggMenuItem('advisors', elgg_echo('advisors:advisors'), 'advisors');
	elgg_register_menu_item('site', $item);
	elgg_register_entity_type('object', 'advisors');
}

elgg_register_event_handler ( 'init', 'system', 'advisors_init' );