<?php

/** Setup **/
$options = $pairCompany = array ();
$title = 'People'; // title is the title of page
$page_filter = 'all';
$action = 'create';
$pagination = '9';

/**
 * Configuring the options to filter the content *
 */

$vetorFunctions = get_input ( 'functions_list' );
$vetorSpaces = get_input ( 'spaces_list' );
$itemCompany = get_input('companies');



$pairFunctions = array (
        'name' => 'functions',
        'value' => $vetorFunctions 
);
$pairSpaces = array (
        'name' => 'spaces',
        'value' => $vetorSpaces 
);

if(!empty($itemCompany)){
$pairCompany = array(
	   'name' => 'company',
        'value' => $itemCompany
);
}


$parameters = array (
                $pairFunctions,
                $pairSpaces,
                $pairCompany
        );



$options = array (
        'type' => 'user',
        'limit' => $pagination,
        'owner_guid' => get_input ( "owner_guid", ELGG_ENTITIES_ANY_VALUE ),
        'full_view' => FALSE,
        'metadata_case_sensitive' => FALSE,
        'metadata_name_value_pairs_operator' => 'AND',
        'metadata_name_value_pairs' => $parameters,
        'view_path_list' => 'people/list' 
);



$list_post = elgg_list_entities ( $options, 'elgg_get_entities_from_metadata', 'view_adm_permission' );

$params = array (
        'content' => $list_post,
        'filter_context' => $page_filter,
        'class' => 'elgg-river-layout',
        'spaces' => $vetorSpaces,
        'functions' => $vetorFunctions,
        'functSelected' => 'functionSelected',
        'companies_html' => true
)
;

$body = elgg_view_layout ( 'two_sidebar', $params );
echo elgg_view_page ( $title, $body );

?>