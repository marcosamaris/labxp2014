<?php
/**
 * Delete blog entity
 *
 * @package Blog
 */

$blog_guid = get_input('guid');
$blog = get_entity($blog_guid);

if (elgg_instanceof($blog, 'object', 'advisors') && $blog->canEdit()) {
	$container = get_entity($blog->container_guid);
	if ($blog->delete()) {
		system_message(elgg_echo('advisors:deleted_advisor'));
		if (elgg_instanceof($container, 'group')) {
			forward("home/group/$container->guid/all");
		} else {
			forward("home/owner/$container->username");
		}
	} else {
		register_error(elgg_echo('home:error:cannot_delete_post'));
	}
} else {
	register_error(elgg_echo('home:error:post_not_found'));
}

forward(REFERER);