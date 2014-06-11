<?php
/**
 * Delete advisor entity
 *
 * @package Advisors
 */

$advisor_guid = get_input('guid');
$advisor = get_entity($advisor_guid);

$elggUrl = elgg_get_site_entity()->getURL ();
$forwardUrl = $elggUrl."admin/plugin_settings/advisors";

if (elgg_instanceof($advisor, 'object', 'advisors') && $advisor->canEdit()) {
	
	$container = get_entity($advisor->container_guid);
	
	if ($advisor->delete()) {
		system_message(elgg_echo('advisors:deleted_advisor'));
		forward($forwardUrl);
	} else {
		register_error(elgg_echo('home:error:cannot_delete_post'));
	}
	
} else {
	register_error(elgg_echo('home:error:post_not_found'));
}


$elggUrl = elgg_get_site_entity()->getURL ();


forward($forwardUrl);