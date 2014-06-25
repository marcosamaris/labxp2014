<?php

elgg_register_event_handler ( 'init', 'system', 'library_monashees' );

function library_monashees() {
	elgg_register_library('elgg:library_monashees', elgg_get_plugins_path() . 'library_monashees/lib/list_users.php');
	elgg_load_library('elgg:library_monashees');
}