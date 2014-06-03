<?php
function advisors_init() {	
	// add a site navigation item
	$item = new ElggMenuItem('advisors', elgg_echo('advisors:advisors'), 'advisors');
	elgg_register_menu_item('site', $item);
	elgg_register_entity_type('object', 'advisors');
	
	elgg_register_event_handler('update', 'all', 'advisors_save');
	elgg_register_event_handler('create', 'all', 'advisors_save');
	elgg_register_plugin_hook_handler('action', 'plugins/settings/save', 'advisor_save_admin');
}

elgg_register_event_handler ( 'init', 'system', 'advisors_init' );


function advisors_save($event, $object_type, $object) {
	if ($object instanceof ElggEntity) {
		/*$marker = get_input('universal_category_marker');

		if ($marker == 'on') {*/
		$functions = get_input('functions');
		$functions1 = get_input('functions1');

		$spaces = get_input('spaces');
			
		$functions  = array(
				$functions, $functions1,
		);
			
		if (empty($functions)) {
			$functions  = array();
		}
		if (empty($spaces)) {
			$spaces = array();
		}

		$object->spaces = $spaces;
		$object->functions = $functions;
		//}
	}
	return TRUE;
}

function advisor_save_admin($hook, $type, $value, $params) {
	$plugin_id = get_input('plugin_id');
	if ($plugin_id != 'advisors') {
		return $value;
	}

	$advisorname = get_input('advisorname');
	$advisordescr = get_input('advisordescr');
	$advisoremail = get_input('advisoremail');
	$advisorskype = get_input('advisorskype');
	$advisorlinkedin = get_input('advisorlinkedin');
	$advisorplus = get_input('advisorplus');
	$advisortwitter = get_input('advisortwitter');
	$advisorfb = get_input('advisorfb');
	$advisorimage = get_input('advisorimage');
	 	
	$site = elgg_get_site_entity();
	
	$site->owner_guid = elgg_get_logged_in_user_guid();
	$site->filters_functions  = $filters_functions;
	$site->filters_spaces = $filters_spaces;
	
	$site->advisorname = $advisorname;
	$site->advisordescr = $advisordescr;
	$site->advisoremail = $advisoremail;
	$site->advisorskype = $advisorskype;
	$site->advisorlinkedin = $advisorlinkedin;
	$site->advisorplus = $advisorplus;
	$site->advisortwitter = $advisortwitter;
	$site->advisorfb = $advisorfb;
	$site->advisorimage = $advisorimage;

	system_message(elgg_echo("advisors:save:success"));

	#elgg_delete_admin_notice('categories_admin_notice_no_categories');

	forward(REFERER);
}