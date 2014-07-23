<?php
elgg_register_event_handler ( 'init', 'system', 'advisors_init' );

function advisors_init() {
    
    // add a site navigation item
    $item = new ElggMenuItem ( 'advisors', elgg_echo ( 'advisors:advisors' ), 'advisors' );
    elgg_register_menu_item ( 'site', $item );
    elgg_register_entity_type ( 'object', 'advisors' );
    
    //set the function save of admin settings to function advisor_save_admin()  
    elgg_register_plugin_hook_handler ( 'action', 'plugins/settings/save', 'advisor_save_admin' );
    
    //associate the action of each form with an action pre-defined
    elgg_register_action ( 'advisors/delete', elgg_get_plugins_path () . "advisors/actions/advisors/delete.php" );
    elgg_register_action ( "advisors/upload", elgg_get_plugins_path () . "advisors/actions/advisors/upload.php" );
    
    //call a page handler function (friendly urls)
    elgg_register_page_handler ( 'advisors', 'advisors_page_handler' );
    
    //for customize the menu that appears for each advisor in an object
    elgg_register_plugin_hook_handler ( 'register', 'menu:entity', 'elgg_advisors_menu_setup' );
    
}
function elgg_advisors_menu_setup($hook, $type, $value, $params) {
    $handler = elgg_extract ( 'handler', $params, false );
    if ($handler != 'advisors') {
        return $value;
    }
    
    foreach ( $value as $index => $item ) {
        $name = $item->getName ();
        if ($name != 'delete') {
            unset ( $value [$index] );
        }
    }
    $entity = $params ['entity'];
    return $value;
}
function advisors_page_handler($page) {
    $user = elgg_get_logged_in_user_entity ();
    $page_type = $page [0];
    if ((! $page [0] && $user->permission == 'allowed') || elgg_is_admin_logged_in ()) {
        switch ($page_type) {
            case 'upload' :
                
                include elgg_get_plugins_path () . 'advisors/pages/advisors/imageform.php';
                break;
            case 'save_upload' :
                include elgg_get_plugins_path () . 'advisors/pages/advisors/upload.php';
                break;
            default :
                include elgg_get_plugins_path () . 'advisors/pages/advisors/index.php';
                break;
        }
    } else {
        include elgg_get_plugins_path () . 'home/pages/home/register.php';
    }
    
    return true;
}
/**
 * Function used in the function elgg_register_plugin_hook_handler for save the admin settings
 * 
 * @param $hook The hook being called.
 * @param $type The type of entity you're being called on.
 * @param $returnvalue The return value. IMPORTANT: Unless you are adding to or otherwise changing the return value DO NOT RETURN ANYTHING.
 * @param $params An array of parameters.
 */
function advisor_save_admin($hook, $type, $returnvalue, $params) {
    $plugin_id = get_input ( 'plugin_id' );
    if ($plugin_id != 'advisors') {
        return $value;
    }
    
    $advisor = new ElggObject ();
    
    $advisor->subtype = "advisors";
    
    $advisor->owner_guid = elgg_get_logged_in_user_guid ();
    
    $advisor->advisorname = get_input ( 'advisorname' );
    $advisor->advisordescription = get_input ( 'advisordescription' );
    $advisor->advisorbookofficehours = get_input ( 'advisorbookofficehours' );
    $advisor->advisoremail = get_input ( 'advisoremail' );
    $advisor->advisorskype = get_input ( 'advisorskype' );
    $advisor->advisorlinkedin = get_input ( 'advisorlinkedin' );
    $advisor->advisorgoogleplus = get_input ( 'advisorgoogleplus' );
    $advisor->advisortwitter = get_input ( 'advisortwitter' );
    $advisor->advisorfacebook = get_input ( 'advisorfacebook' );
    $advisor->access_id = "1";
    $advisor->save ();
    
    system_message ( elgg_echo ( "advisors:save:success" ) );
    
    forward ( REFERER );
}