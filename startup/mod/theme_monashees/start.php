<?php
/**
 * Twitter bootstrap theme for Monashees
 * This plugin replace the original jquery from elgg and replace it with a newest version of this library. To do that, we need load the jquery migrate too for compatibility
 */
elgg_register_event_handler ( 'init', 'system', 'theme_monashees_init' );
function theme_monashees_init() {
    
    // include custom css for this theme
    elgg_extend_view ( 'css/elgg', 'theme_monashees/css' );
    elgg_extend_view ( 'css/admin', 'theme_monashees/admincss' );
    
    // custom js
    $custom_js = 'mod/theme_monashees/views/default/theme_monashees/custom.js';
    elgg_register_js ( 'custom_js', $custom_js );
    
    $jquery_monashees = 'mod/theme_monashees/vendors/plus-network/js/jquery.js';
    elgg_register_js ( 'jquery_monashees', $jquery_monashees, 'head', 1 );
    
    $jquery_migrate = "mod/theme_monashees/vendors/plus-network/js/jquery-migrate-1.2.1.min.js";
    elgg_register_js ( 'jquery_migrate', $jquery_migrate, 'head', 2 );
    
    // register bootstrap css and js
    $bootstrap_js = 'mod/theme_monashees/vendors/plus-network/js/bootstrap.min.js';
    elgg_register_js ( 'bootstrap_js', $bootstrap_js, 'head', 4 );
    
    $bootstrap_css = 'mod/theme_monashees/vendors/plus-network/css/bootstrap.min.css';
    elgg_register_css ( 'bootstrap_css', $bootstrap_css, 1 );
    
    $bootstrap_select_js = "mod/theme_monashees/vendors/plus-network/js/bootstrap-select.min.js";
    elgg_register_js ( 'bootstrap_select_js', $bootstrap_select_js, 'head', 6 );
    
    $bootstrap_checkbox_js = "mod/theme_monashees/vendors/plus-network/js/bootstrap-checkbox.js";
    elgg_register_js ( 'bootstrap_checkbox_js', $bootstrap_checkbox_js, 'head', 5 );
    
    $bootstrap_checkbox_css = 'mod/theme_monashees/vendors/plus-network/css/bootstrap-checkbox.css';
    elgg_register_css ( 'bootstrap_checkbox_css', $bootstrap_checkbox_css, 4 );
    
    $grid_css = 'mod/theme_monashees/vendors/plus-network/css/grid.css';
    elgg_register_css ( 'grid_css', $grid_css, 2 );
    
    $style_css = 'mod/theme_monashees/vendors/plus-network/css/style.css';
    elgg_register_css ( 'style_css', $style_css, 3 );
    
    $bootstrap_css_resp = 'mod/twitter_bootstrap/vendors/bootstrap/css/bootstrap-responsive.min.css';
    elgg_register_css ( 'bootstrap_css_resp', $bootstrap_css_resp, 10 );
    
    // unregister internal jquery for replace it with the newest version, it's required for use bootstrap library
    elgg_unregister_js ( 'jquery' );
    
    // Load the newest version of jquery and the compatibility plugin
    elgg_load_js ( 'jquery_monashees' );
    elgg_load_js ( 'jquery_migrate' );
    
    $get_context = elgg_get_context ();
    // we don't want bootstrap loading when in the admin area, not sure this is the best way to do this
    if ($get_context != 'admin') {
        
        elgg_load_js ( 'bootstrap_js' );
        elgg_load_js ( 'bootstrap_select_js' );
        elgg_load_js ( 'bootstrap_checkbox_js' );
        elgg_load_js ( 'custom_js' );
        
        elgg_load_css ( 'bootstrap_css' );
        elgg_load_css ( 'grid_css' );
        elgg_load_css ( 'style_css' );
        elgg_load_css ( 'bootstrap_checkbox_css' );
    }
    
    /**
     * TOPBAR
     */
    // To remove the menu from topbar
    elgg_unregister_menu_item ( 'topbar', 'elgg_logo' );
    elgg_unregister_menu_item ( 'topbar', 'friends' );
    
    if (elgg_is_logged_in ()) {
        
        if (elgg_is_active_plugin ( 'profile' )) {
            elgg_unregister_menu_item ( 'topbar', 'profile' );
        }
        
        elgg_unregister_menu_item ( 'topbar', 'usersettings' );
        elgg_unregister_menu_item ( 'topbar', 'logout' );
    }
    
    $user = elgg_get_logged_in_user_entity ();
    
    if (elgg_is_active_plugin ( 'search' ) && ($user->permission == 'allowed' || elgg_is_admin_logged_in ())) {
        elgg_unextend_view ( 'page/elements/header', 'search/search_box' );
        elgg_extend_view ( 'page/elements/topbar', 'search/search_box' );
        // ACK: replace the search/header with a empty file
    }
    
    // To remove the RSS icon from sidebar
    elgg_unregister_plugin_hook_handler ( 'output:before', 'layout', 'elgg_views_add_rss_link' );
    
    elgg_register_page_handler ( 'profile', 'monashees_profile_page_handler' );
}
function monashees_profile_page_handler($page) {
    if (isset ( $page [0] )) {
        $username = $page [0];
        $user = get_user_by_username ( $username );
        elgg_set_page_owner_guid ( $user->guid );
    } elseif (elgg_is_logged_in ()) {
        forward ( elgg_get_logged_in_user_entity ()->getURL () );
    }
    
    // short circuit if invalid or banned username
    if (! $user || ($user->isBanned () && ! elgg_is_admin_logged_in ())) {
        register_error ( elgg_echo ( 'profile:notfound' ) );
        forward ();
    }
    
    $action = NULL;
    if (isset ( $page [1] )) {
        $action = $page [1];
    }
    
    if ($action == 'edit') {
        // use the core profile edit page
        $base_dir = elgg_get_root_path ();
        require "{$base_dir}pages/profile/edit.php";
        return true;
    }
    
    // main profile page
    /*$params = array (
            'content' => elgg_view ( 'profile/wrapper' ),
            'num_columns' => 3 
    );*/
    
    //$content = elgg_view_layout ( 'widgets', $params );
    
    
    $body = elgg_view_layout ( 'two_sidebar', array (
            'content' => elgg_view ( 'profile/wrapper' )."".elgg_view("profile/owner_block")."".elgg_view("profile/homeposts"),
            'username' => $username 
    ) );
    
    echo elgg_view_page ( $user->name, $body );
    return true;
}

