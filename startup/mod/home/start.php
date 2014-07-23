<?php
elgg_register_event_handler ( 'init', 'system', 'home_init' );
function home_init() {
    
    // add a site navigation item
    $item = new ElggMenuItem ( 'home', elgg_echo ( 'home:home' ), 'home' );
    elgg_register_menu_item ( 'site', $item );
    elgg_register_entity_type ( 'object', 'home' );
    
    // register a page handler for friendly url
    elgg_register_page_handler ( 'home', 'home_page_handler' );
    
    // register actions for each form
    elgg_register_action ( "home/save", elgg_get_plugins_path () . "home/actions/home/save.php" );
    elgg_register_action ( "home/register", elgg_get_plugins_path () . "home/actions/home/register.php" );
    elgg_register_action ( 'home/delete', elgg_get_plugins_path () . "home/actions/home/delete.php" );
    
    // setting the home_index as first page after login for registered users
    register_plugin_hook ( 'index', 'system', 'home_index' );
    
    // for add comments and actions for each post
    elgg_register_plugin_hook_handler ( 'register', 'menu:home', 'elgg_post_menu_setup' );
    elgg_register_plugin_hook_handler('register', 'menu:annotation', 'home_annotation_menu_setup');
    
    // for remove the activity page
    elgg_unregister_page_handler ( 'activity' );
    elgg_unregister_menu_item ( 'site', 'activity' );
    elgg_register_page_handler ( 'activity', 'core_twocan_page_handler' );
}

function home_annotation_menu_setup($hook, $type, $return, $params) {
    $annotation = $params['annotation'];
    /* @var ElggAnnotation $annotation */

    if ($annotation->name == 'generic_comment' && $annotation->canEdit()) {
        $url = elgg_http_add_url_query_elements('action/comments/delete', array(
                'annotation_id' => $annotation->id,
        ));

        $options = array(
                'name' => 'delete',
                'href' => $url,
                //'text' => "<span class=\"elgg-icon elgg-icon-delete\"></span>",
                'text' =>  elgg_echo ( 'home:delete' ),
                'title' => elgg_echo ( 'home:delete' ),
                'confirm' => elgg_echo('deleteconfirm'),
                'encode_text' => false
        );
        $return[] = ElggMenuItem::factory($options);
    }

    return $return;
}


function home_index($hook, $type, $return, $params) {
    $user = elgg_get_logged_in_user_entity ();
    if ($return == true) {
        return $return;
    }
    // index.php can do whatever it needs to for loggedIn or loggedOut
    
    if (($user->permission == 'allowed') || elgg_is_admin_logged_in ()) {
        if (! include_once (dirname ( __FILE__ ) . "/pages/home/index.php")) {
            return false;
        }
    } else if (! include_once (dirname ( __FILE__ ) . '/pages/home/register.php')) {
        
        return false;
    }
    
    return true;
}
function elgg_post_menu_setup($hook, $type, $value, $params) {
    $handler = elgg_extract ( 'handler', $params, false );
    if ($handler != 'home') {
        return $value;
    }
    
    foreach ( $value as $index => $item ) {
        $name = $item->getName ();
       // if ($name != 'delete') {
            unset ( $value [$index] );
        //}
    }
    $entity = $params ['entity'];
    
    // delete link
    $options = array (
            'name' => 'delete',
            //'text' => elgg_view_icon ( 'delete' ),
            'text' =>  elgg_echo ( 'home:delete' ),
            'title' => elgg_echo ( 'home:delete' ),
            
            'href' => "action/$handler/delete?guid={$entity->getGUID()}",
            'confirm' => elgg_echo ( 'deleteconfirm' ),
            'priority' => 2 
    );
    $value [] = ElggMenuItem::factory ( $options );
    
    $options = array (
            'name' => 'comment',
            'href' => "#comments-add-{$entity->getGUID()}",
            //'text' => elgg_view_icon ( 'speech-bubble' ),
            'text' => elgg_echo ( 'home:addanswer' ),
            'title' => elgg_echo ( 'home:addanswer' ),
            'rel' => 'toggle',
            'priority' => 1 
    );
    
    $value [] = ElggMenuItem::factory ( $options );
    
    // likes button
    /*$options = array (
            'name' => 'likes',
            'text' => elgg_view ( 'likes/button', array (
                    'entity' => $entity 
            ) ),
            
            'href' => false,
            'priority' => 50 
    );
    $value [] = ElggMenuItem::factory ( $options );*/
    
    // likes count
    /*$count = elgg_view ( 'likes/count', array (
            'entity' => $entity 
    ) );
    if ($count) {
        $options = array (
                'name' => 'likes_count',
                'text' => $count,
                'href' => false,
                'priority' => 51 
        );
        $value [] = ElggMenuItem::factory ( $options );
    }*/
    
    return $value;
}
function home_page_handler($segments) {
    $user = elgg_get_logged_in_user_entity ();
    if ((! $segments [0] && $user->permission == 'allowed') || elgg_is_admin_logged_in ()) {
        include elgg_get_plugins_path () . 'home/pages/home/index.php';
    } else {
        include elgg_get_plugins_path () . 'home/pages/home/register.php';
    }
    
    return true;
}
