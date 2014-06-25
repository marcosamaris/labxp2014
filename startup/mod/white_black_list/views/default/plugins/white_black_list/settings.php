<?php
/**
 * Administrator sets the categories for the site
 *
 * @package ElggCategories
 */

// Get site categories
$site = elgg_get_site_entity();
$filters_functions = $site->filters_functions;
$filters_spaces = $site->filters_spaces;


$permission = array('name' => 'permission', 'value' => 'allowed');


$options = array(
		'type' => 'user',
		'limit' => $pagination,
		'full_view' => FALSE,
		'metadata_case_sensitive' => FALSE,
		'metadata_name_value_pairs_operator' => 'AND',
		'metadata_name_value_pairs' => array($permission),
		'view_path_list' => 'page/components/pendent_users'
		
);


$metadataFunction = 'elgg_get_entities_from_metadata';
$permissionFunction = 'view_adm_permission';
$content = elgg_list_entities($options, $metadataFunction, $permissionFunction);

echo $content;
