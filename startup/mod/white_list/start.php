<?php
elgg_register_event_handler ( 'init', 'system', 'white_list_init');
function white_list_init() {
	elgg_register_plugin_hook_handler ( 'action', 'plugins/settings/save', 'white_list_admin' );
	elgg_register_event_handler ( 'update', 'all', 'white_list_update_user' );

}
function white_list_admin($hook, $type, $value, $params) {

	$pluginId = get_input ( 'plugin_id' );
	if ($pluginId != 'white_list') {
		return $value;
	}

	$company_emails = get_input ( 'company_email' );
	$company_emails = string_to_tag_array ( $company_emails );


	$site = elgg_get_site_entity ();
	$site->company_emails = $company_emails;


	system_message ( elgg_echo ( "filters:save:success" ) );

	forward ( REFERER );

}



function white_list_update_user($event, $objectType, $object) {
	if ($object instanceof ElggUser) {
		$site = elgg_get_site_entity ();

		$email = get_input ( 'company_email' );

		$user = get_user($object->guid);
		$teste = 'pedro10@cp.com';
		$value = array();
		if (!empty ( $email )) {
			
		
			if(!is_array($site->company_emails)){
				$emails = array($site->company_emails);
			}else{
				$emails = $site->company_emails;
			}
						
			if(in_array($email,$emails)) {
				$user->permission = 'allowed';
			}
			$user->company_email = $email;
		}
	}
	return TRUE;
}
