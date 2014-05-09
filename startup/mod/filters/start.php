<?php

function filters_init()
{
	
	elgg_register_event_handler('update', 'all', 'filters_save');
	elgg_register_event_handler('create', 'all', 'filters_save');
	elgg_register_plugin_hook_handler('action', 'plugins/settings/save', 'filters_save_admin_categories');
	
	
	
}

/**
 * Saves the site categories.
 *
 * @param type $hook
 * @param type $type
 * @param type $value
 * @param type $params
 */

function filters_save($event, $object_type, $object) {
	if ($object instanceof ElggEntity) {
		/*$marker = get_input('universal_category_marker');

		if ($marker == 'on') {*/
			$functions = get_input('functions');
			$spaces = get_input('spaces');
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

function filters_save_admin_categories($hook, $type, $value, $params) {
	$plugin_id = get_input('plugin_id');
	if ($plugin_id != 'filters') {
		return $value;
	}

	$filters_functions = get_input('filters_functions');
	$filters_functions = string_to_tag_array($filters_functions);

	$filters_spaces = get_input('filters_spaces');
	$filters_spaces = string_to_tag_array($filters_spaces);
	
	
	$site = elgg_get_site_entity();
	$site->filters_functions  = $filters_functions;
	$site->filters_spaces = $filters_spaces;
	
	system_message(elgg_echo("filters:save:success"));

	#elgg_delete_admin_notice('categories_admin_notice_no_categories');

	forward(REFERER);
}







elgg_register_event_handler('init', 'system', 'filters_init');
