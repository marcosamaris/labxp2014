<?php
/**
 * Twitter bootstrap theme for Elgg
 * 
 */

elgg_register_event_handler('init', 'system', 'monashees_bootstrap_init');

function monashees_bootstrap_init() {
	
	//extend CSS of elgg
	elgg_extend_view('css/elgg', 'theme_monashees/css');
	
	
	//loading libraries (js and css)
	$jquery = 'mod/theme_monashees/vendors/bootstrap/js/jquery.js';
	elgg_register_js('jquery_bootstrap', $jquery, 'head', 10);
		
	$bootstrap_js = 'mod/theme_monashees/vendors/bootstrap/js/bootstrap.min.js';
	elgg_register_js('bootstrap', $bootstrap_js, 'footer');
	
	$bootstrap_css = 'mod/theme_monashees/vendors/bootstrap/css/bootstrap.min.css';
	elgg_register_css('bootstrap_css', $bootstrap_css, 10);
	
	$bootstrap_css_resp = 'mod/theme_monashees/vendors/bootstrap/css/bootstrap-responsive.min.css';
	elgg_register_css('bootstrap_css_resp', $bootstrap_css_resp, 10);

	
	//change the jquery default of elgg, required version jquery 1.9 for bootstrap 2.3
	elgg_unregister_js('jquery');
	elgg_load_js('jquery_bootstrap');
		
		
		
		
	$get_context = elgg_get_context();
	
	//we don't want bootstrap loading when in the admin area, not sure this is the best way to do this
	//@todo find out the best approach - perhaps this should be in the pagesetup_handler?
	if($get_context != 'admin'){
		elgg_load_js('bootstrap');
		elgg_load_js('custom_js');
		elgg_load_css('bootstrap_css');
		elgg_load_css('bootstrap_css_resp');
	}
	
	elgg_register_event_handler('pagesetup', 'system', 'bootstrap_theme_pagesetup_handler', 1000);
	
	
}

function bootstrap_theme_pagesetup_handler() {
	

}