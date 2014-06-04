<?php

/** Setup **/	
$options = array();
$title = 'Home'; //title is the title of page
$page_filter = 'all';
$action = 'create';
$pagination = '10';

/** Configuring the options to filter the content **/


$vetorFunctions = get_input('functions_list');
$vetorSpaces = get_input('spaces_list');

$pairFunctions = array('name' => 'functions', 'value' => $vetorFunctions);
$pairSpaces = array('name'=> 'spaces', 'value' => $vetorSpaces);

$options = array(
		'type' => 'object',
		'subtype' => 'advisors',
		'limit' => $pagination, 
		'owner_guid' => get_input("owner_guid", ELGG_ENTITIES_ANY_VALUE),
		'full_view' => FALSE,
		'metadata_case_sensitive' => FALSE,
		'metadata_name_value_pairs_operator' => 'AND',
		'metadata_name_value_pairs' => array($pairFunctions,$pairSpaces),
);


/** Setup page **/


$form = elgg_view_form("home/save");

$action = 'create';


$list_post = elgg_list_entities_from_metadata($options);
$params = array(
		'content' =>  $list_post,
		'filter_context' => $page_filter,
		'class' => 'elgg-river-layout',
		'spaces' => $vetorSpaces,
		'functions' => $vetorFunctions,
		'functSelected' => 'functionSelected',
		
);

$body = elgg_view_layout('two_sidebar', $params);
echo elgg_view_page($title, $body); 
