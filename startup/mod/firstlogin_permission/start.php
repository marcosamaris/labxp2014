<?php

 
elgg_register_event_handler('login','user','permission_check');



function permission_check($event,$type,$params){
	if($params instanceof ElggUser){
		$user = $params;
		if($user->last_login == 0){
			$user->permission = 'allowed';
		}
		
	}
}