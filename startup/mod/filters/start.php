<?php

/**
 * Elgg filters
 *
 */

elgg_register_event_handler('init', 'system', 'filters_init');

function filters_init()
{
	elgg_register_js('elgg.filters', 'mod/filters/views/default/js/filters/filters.js');	

	elgg_register_event_handler('update', 'all', 'filters_save_entity');
	elgg_register_event_handler('create', 'all', 'filters_save_entity');
	elgg_register_plugin_hook_handler('action', 'plugins/settings/save', 'filters_save_admin_categories');
	
	
	
}

/**
 * Saves the site categories.
 *
 * @param type $event
 * @param type $object_type
 * @param type $object
 * 
 * @TODO Rever o save de filters. Ele está salvando functions e spaces para todas as entidades. 
 */

function filters_save_entity($event, $object_type, $object) {
	if ($object instanceof ElggEntity) {

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
	
	$filters_companies = get_input('filters_companies');
	$filters_companies = string_to_tag_array($filters_companies);
	
	$site = elgg_get_site_entity();
	$site->filters_functions  = $filters_functions;
	$site->filters_spaces = $filters_spaces;
	$site->filters_companies = $filters_companies;
	
	system_message(elgg_echo("filters:save:success"));

	forward(REFERER);
}


?>
