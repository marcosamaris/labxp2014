<?php

/**
 * Initialize the plugin
 */
function myplugin_init() {
	register_plugin_hook('unit_test', 'system', 'myplugin_unit_tests');	
}

/**
 * Adds this plugin's unit tests when unit test hook is triggered
 * 
 * @param $hook
 * @param $type
 * @param $value
 * @param $params
 * @return array
 */
function myplugin_unit_tests($hook, $type, $value, $params) {
	global $CONFIG;
	$value[] = $CONFIG->path . 'mod/myplugin/tests/myplugin.php';
	return $value;
}

function myplugin_function1() {
	return true;
}

function myplugin_function2() {
	return "hello, world";
}

function myplugin_function3() {
	throw new CallException('test');
}

register_elgg_event_handler('init','system','myplugin_init');
