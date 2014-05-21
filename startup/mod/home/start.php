<?php


elgg_register_event_handler('init', 'system', 'home_init');



function home_init() {
	elgg_register_library('elgg:home', elgg_get_plugins_path() . 'home/lib/home.php');
	// add a site navigation item
	$item = new ElggMenuItem('home', elgg_echo('home:home'), 'home');
	elgg_register_menu_item('site', $item);
	elgg_register_entity_type('object', 'home');
	
	//$home_js = elgg_get_simplecache_url('js', 'home/home');
	
	//elgg_register_simplecache_view('js/home/home');
	//$url = elgg_get_simplecache_url('js', 'home/home');

	//$js_url = elgg_get_simplecache_url('js', elgg_get_plugins_path() . 'home/js/home/home.js'); // this gets the path to your js file in Elgg's cache. Place your js file in my_plugin/views/default/js/my_plugin/my_js.php
	//elgg_register_js('home.js', $js_url);

	//elgg_register_js('elgg.home', 'mod/home/views/default/js/home/home.js');	
	
	//elgg_extend_view('js/elgg', 'js/home/home')
	
	//elgg_load_js('elgg.ajax');
	
	elgg_register_page_handler('home', 'home_page_handler');
	elgg_register_action("home/save", elgg_get_plugins_path() . "home/actions/home/save.php");
	elgg_register_action('home/delete',  elgg_get_plugins_path() . "home/actions/home/delete.php");
	

}


function home_page_handler($segments) {	
	elgg_load_library('elgg:home');
	include elgg_get_plugins_path() . 'home/pages/home/index.php';
	
	return true;	
}
