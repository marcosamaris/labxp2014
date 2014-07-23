<?php

/** Setup **/
$options = array ();
$title = 'Home'; // title is the title of page
$page_filter = 'all';
$action = 'create';
$pagination = '10';

/**
 * Configuring the options to filter the content
 */

$vetorFunctions = get_input ( 'functions_list' );
$vetorSpaces = get_input ( 'spaces_list' );

$pairFunctions = array (
        'name' => 'functions',
        'value' => $vetorFunctions 
);
$pairSpaces = array (
        'name' => 'spaces',
        'value' => $vetorSpaces 
);


$options = array (
        'type' => 'object',
        'subtype' => 'home',
        'limit' => $pagination,
        'owner_guid' => get_input ( "owner_guid", ELGG_ENTITIES_ANY_VALUE ),
        'full_view' => FALSE,
        'metadata_case_sensitive' => FALSE,
        'metadata_name_value_pairs_operator' => 'AND',
        'metadata_name_value_pairs' => array (
                $pairFunctions,
                $pairSpaces 
        ) ,
        'view_path_list' => 'home/list'
);

/**
 * Setup page
 */

//FORM
$form = elgg_view_form ( "home/save", array("role"=>"form", "class"=>"") );
$container_form = '<div class="container-form">'.$form.'</div>';

//LIST OF POSTS
$list_post = elgg_list_entities_from_metadata ( $options );


//$list_post = elgg_list_entities ( $options, 'elgg_get_entities_from_metadata', 'view_adm_permission' );


$container_posts = '<div class="container-posts">'.$list_post.'</div>';


$params = array (
        'content' => $container_form . $container_posts,
        'filter_context' => $page_filter,
        'spaces' => $vetorSpaces,
        'functions' => $vetorFunctions,
        'functSelected' => 'functionSelected' 
)
;

$body = elgg_view_layout ( 'two_sidebar', $params );
echo elgg_view_page ( $title, $body ); 
