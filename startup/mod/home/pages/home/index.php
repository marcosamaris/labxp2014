<?php

/**

* Main activity stream list page

*/


//if (elgg_is_admin_logged_in()) {
//elgg_load_js('elgg.home');	
$options = array();


$page_type = preg_replace('[\W]', '', get_input('page_type', 'all'));
$type = preg_replace('[\W]', '', get_input('type', 'all'));
$active_section =
$subtype = preg_replace('[\W]', '', get_input('subtype', ''));


$selector = "type=$type";

$title = '';

$page_filter = 'all';

$functionTemp = get_input('functions_list');
$spacesTemp = get_input('spaces_list');

//Preparing selected functions and spaces to the query
//Using pair of queries between functions and spaces.
$functions = 'functions';
$vetorFunctions = $functionTemp;
$spaces = 'spaces';
$vetorSpaces = $spacesTemp;

//
$pair1 = array('name' => $functions, 'value' =>$vetorFunctions);
$pair2 = array('name'=> $spaces, 'value' => $vetorSpaces);

$options = array(
		//'metadata_name' => $vetorName,
		//'metadata_value' => $vetorFunctions,
		'type' => 'object',
		'subtype' => 'home',
		'limit' => '10',
		'owner_guid' => get_input("owner_guid", ELGG_ENTITIES_ANY_VALUE),
		'full_view' => FALSE,
		'metadata_case_sensitive' => FALSE,
		'metadata_name_value_pairs_operator' => 'AND',
		'metadata_name_value_pairs' => array($pair1,$pair2),
);
// set the title
// for distributed plugins, be sure to use elgg_echo() for internationalization

// start building the main column of the page

$content =  elgg_view_title($title);
// add the form to this section

$content .= elgg_view_form("home/save");

// optionally, add the content for the sidebar
$sidebar = "";

$action = 'create';

if (!is_array($vetorSpaces)) {
	$spaces = array($vetorSpaces);
}

if (!is_array($vetorFunctions)) {
	$spaces = array($vetorFunctions);
}


$activity = elgg_list_home_filter($options);
$params = array(
		'content' =>  $content . $activity,
		'filter_context' => $page_filter,
		'class' => 'elgg-river-layout',
		'spaces' => $vetorSpaces,
		'functions' => $vetorFunctions,
		'functSelected' => 'functionSelected',
		
);

$body = elgg_view_layout('two_sidebar', $params);
echo elgg_view_page($title, $body);
