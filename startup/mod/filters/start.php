<?php

/**
 * Monashees' filters
 *
 */
elgg_register_event_handler ( 'init', 'system', 'filters_init' );
function filters_init() {
    elgg_register_js ( 'elgg.filters', 'mod/filters/views/default/js/filters/filters.js' );
    
    elgg_register_event_handler ( 'update', 'all', 'filters_save_entity' );
    elgg_register_event_handler ( 'create', 'all', 'filters_save_entity' );
    
    //associate an save action in filter admin with the function filters_save_admin_categories
    elgg_register_plugin_hook_handler ( 'action', 'plugins/settings/save', 'filters_save_admin_categories' );
}

/**
 * Saves the site categories.
 *
 * @param type $event            
 * @param type $objectType            
 * @param type $object
 *            @TODO Rever o save de filters. Ele está salvando functions e spaces para todas as entidades.
 */
function filters_save_entity($event, $objectType, $object) {
    if ($object instanceof ElggEntity) {
        
        $functions = get_input ( 'functions' );
        $functions1 = get_input ( 'functions1' );
        $spaces = get_input ( 'spaces' );
        $email = get_input ( 'companie_mail' );
        
        $functions = array (
                $functions,
                $functions1 
        );
        
        if (empty ( $functions )) {
            $functions = array ();
        }
        if (empty ( $spaces )) {
            $spaces = array ();
        }
        $object->spaces = $spaces;
        $object->functions = $functions;
        
        if (! empty ( $email )) {
            $object->companie_mail = $email;
        }
    }
    return TRUE;
}
/**
 * Saves the filters in the admin page
 *
 * @param type $hook 
 * @param type $type
 * @param type $value
 * @param type $params optional
 */
function filters_save_admin_categories($hook, $type, $value, $params) {
    
    $pluginId = get_input ( 'plugin_id' );
    if ($pluginId != 'filters') {
        return $value;
    }
    
    $filtersFunctions = get_input ( 'filters_functions' );
    $filtersFunctions = string_to_tag_array ( $filtersFunctions );
    
    $filtersSpaces = get_input ( 'filters_spaces' );
    $filtersSpaces = string_to_tag_array ( $filtersSpaces );
    
    $filtersCompanies = get_input ( 'filters_companies' );
    $filtersCompanies = string_to_tag_array ( $filtersCompanies );
    
    $filtersRoles = get_input ( 'filters_roles' );
    $filtersRoles = string_to_tag_array ( $filtersRoles );
    
    $site = elgg_get_site_entity ();
    $site->filters_functions = $filtersFunctions;
    $site->filters_spaces = $filtersSpaces;
    $site->filters_companies = $filtersCompanies;
    $site->filters_roles = $filtersRoles;
    
    system_message ( elgg_echo ( "filters:save:success" ) );
    
    forward ( REFERER );
}

?>
