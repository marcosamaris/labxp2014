<?php
elgg_register_event_handler ( 'init', 'system', 'white_black_list_init' );
function white_black_list_init() {
	elgg_register_plugin_hook_handler ( 'action', 'plugins/settings/save', 'pendent_user_admin' );
}
function pendent_user_admin($hook, $type, $value, $params) {
	$plugin_id = get_input ( 'plugin_id' );
	if ($plugin_id != 'signup_pendent_list') {
		return $value;
	}

	$ids = get_input ( 'pendent_users' );

	if (empty ( $ids )) {
		$ids = array ();
	}

	var_dump($ids);

	foreach ($ids as $id){
		$user = get_user ( $id );
		
		if ($user) {
			$user->permission = 'allowed';
		}
	}
	forward ( REFERER );
}
