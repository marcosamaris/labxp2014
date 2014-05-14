<?php

/**

* Main activity stream list page

*/


//if (elgg_is_admin_logged_in()) {

$options = array();


$page_type = preg_replace('[\W]', '', get_input('page_type', 'all'));
$type = preg_replace('[\W]', '', get_input('type', 'all'));
$active_section =
$subtype = preg_replace('[\W]', '', get_input('subtype', ''));


$selector = "type=$type";

$title = elgg_echo('river:all');

$page_filter = 'all';



$options = array(
		'metadata_name' => 'functions',
		'metadata_value' => 'business',
		'type' => 'object',
		'subtype' => 'home',
		'limit' => '10',
		'owner_guid' => get_input("owner_guid", ELGG_ENTITIES_ANY_VALUE),
		'full_view' => FALSE,
		'metadata_case_sensitive' => FALSE,
		
		
);
// set the title
// for distributed plugins, be sure to use elgg_echo() for internationalization
$title = "";

// start building the main column of the page
$content = elgg_view_title($title);

// add the form to this section
$content .= elgg_view_form("home/save");

// optionally, add the content for the sidebar
$sidebar = "";

// layout the page
$body = elgg_view_layout('content', array(
		'content' => $content,
		'sidebar' => $sidebar
));

$action = 'create';

$activity =elgg_list_entities_from_metadata($options);


//$content .= elgg_view('core/river/filter', array('selector' => $selector));



//$sidebar = elgg_view('core/river/sidebar');



$params = array(

		'content' =>  $content . $activity,

		'filter_context' => $page_filter,

		'class' => 'elgg-river-layout',

);



$body = elgg_view_layout('one_sidebar', $params);




echo elgg_view_page($title, $body);