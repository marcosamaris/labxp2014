<?php
/**
 * Twitter bootstrap theme for Elgg
 * 
 */

elgg_register_event_handler('init', 'system', 'theme_monashees_init');

function theme_monashees_init() {

	//include custom css for this theme
	elgg_extend_view('css/elgg', 'theme_monashees/css');
	
	
	//custom js
	$custom_js = 'mod/theme_monashees/views/default/theme_monashees/custom.js';
	elgg_register_js('custom_js', $custom_js);
	
	$jquery_mona = 'mod/theme_monashees/vendors/plus-network/js/jquery.js';
	elgg_register_js('jquery_mona', $jquery_mona, 'head', 10);
	
	$jquery_migrate = "mod/theme_monashees/vendors/plus-network/js/jquery-migrate-1.2.1.min.js";
	elgg_register_js('jquery_migrate', $jquery_migrate, 'head', 10);

	
	//register bootstrap css and js
	$bootstrap_js = 'mod/theme_monashees/vendors/plus-network/js/bootstrap.min.js';
	elgg_register_js('bootstrap_js', $bootstrap_js, 'footer');
	
	$bootstrap_css = 'mod/theme_monashees/vendors/plus-network/css/bootstrap.min.css';
	elgg_register_css('bootstrap_css', $bootstrap_css, 10);
	
	
	$grid_css = 'mod/theme_monashees/vendors/plus-network/css/grid.css';
	elgg_register_css('grid_css', $grid_css, 10);
	
	
	$style_css = 'mod/theme_monashees/vendors/plus-network/css/style.css';
	elgg_register_css('style_css', $style_css, 10);
	
	
	$bootstrap_css_resp = 'mod/twitter_bootstrap/vendors/bootstrap/css/bootstrap-responsive.min.css';
	elgg_register_css('bootstrap_css_resp', $bootstrap_css_resp, 10);
	
	//unregister internal jquery as we will link to Google to get the latest library, required for bootstrap
	elgg_unregister_js('jquery');
	
	
	//load ibraries @todo not sure if this is the best place to do this?
	elgg_load_js('jquery_mona');
	
	elgg_load_js('jquery_migrate');
	
	$get_context = elgg_get_context();
	//we don't want bootstrap loading when in the admin area, not sure this is the best way to do this
	//@todo find out the best approach - perhaps this should be in the pagesetup_handler?
	if($get_context != 'admin'){
		elgg_load_js('bootstrap_js');
		elgg_load_js('custom_js');
		elgg_load_css('bootstrap_css');
		elgg_load_css('grid_css');
		elgg_load_css('style_css');
		
	}	
	
	/** TOPBAR **
	 * 
	 */
	elgg_unregister_menu_item('topbar', 'elgg_logo');
	elgg_unregister_menu_item('topbar', 'friends');
	
	
	if(elgg_is_logged_in()){
	

		if (elgg_is_active_plugin('profile')) {
			elgg_unregister_menu_item('topbar', 'profile');
		}
		
		elgg_unregister_menu_item('topbar', 'usersettings');
		elgg_unregister_menu_item('topbar', 'logout');
		
		
		
	
	}
	
	$user = elgg_get_logged_in_user_entity();
	
	if (elgg_is_active_plugin('search') && ($user->permission == 'allowed' || elgg_is_admin_logged_in())) {
		elgg_unextend_view('page/elements/header', 'search/search_box');
		elgg_extend_view('page/elements/topbar', 'search/search_box');
		#HACK: replace the search/header with a empty file
	}
	
	//For remove the RSS icon from sidebar
	
	elgg_unregister_plugin_hook_handler('output:before', 'layout', 'elgg_views_add_rss_link');
	
}



