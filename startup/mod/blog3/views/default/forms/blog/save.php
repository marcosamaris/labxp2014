<?php
/**
 * Edit blog form
 *
 * @package Blog
 */

$blog = get_entity($vars['guid']);
$vars['entity'] = $blog;

$draft_warning = $vars['draft_warning'];
if ($draft_warning) {
	$draft_warning = '<span class="mbm elgg-text-help">' . $draft_warning . '</span>';
}

$options = array(
		'type' => 'object',
		'subtype' => 'blog',
		'full_view' => false,
);

$list = elgg_list_entities_from_metadata($options);

$action_buttons = '';
$delete_link = '';
$preview_button = '';

if ($vars['guid']) {
	// add a delete button if editing
	$delete_url = "action/blog/delete?guid={$vars['guid']}";
	$delete_link = elgg_view('output/confirmlink', array(
		'href' => $delete_url,
		'text' => elgg_echo('delete'),
		'class' => 'elgg-button elgg-button-delete float-alt'
	));
}

// published blogs do not get the preview button
if (!$vars['guid'] || ($blog && $blog->status != 'published')) {
	$preview_button = elgg_view('input/submit', array(
		'value' => elgg_echo('preview'),
		'name' => 'preview',
		'class' => 'mls',
	));
}

$save_button = elgg_view('input/submit', array(
	'value' => elgg_echo('save'),
	'name' => 'save',
));
$action_buttons = $save_button . $preview_button . $delete_link;

$title_label = elgg_echo('title');
$title_input = elgg_view('input/hidden', array('name' => 'title', 'value' => 'title'));

$excerpt_label = elgg_echo('blog:excerpt');
$excerpt_input = elgg_view('input/text', array(
	'name' => 'excerpt',
	'id' => 'blog_excerpt',
	'value' => _elgg_html_decode($vars['excerpt'])
));

$body_label = elgg_echo('blog:body');
$body_input = elgg_view('input/longtext', array(
	'name' => 'description',
	'id' => 'blog_description',
	'value' => $vars['description']
));

$save_status = elgg_echo('blog:save_status');
if ($vars['guid']) {
	$entity = get_entity($vars['guid']);
	$saved = date('F j, Y @ H:i', $entity->time_created);
} else {
	$saved = elgg_echo('blog:never');
}

$status_label = elgg_echo('blog:status');
$status_input = elgg_view('input/hidden', array('name' => 'status', 'value' => 'published')
);


$comments_label = elgg_echo('comments');
$comments_input = elgg_view('input/hidden', array('name' => 'comments_on', 'value' => elgg_echo('on'))
);

$tags_label = elgg_echo('tags');
$tags_input = elgg_view('input/tags', array(
	'name' => 'tags',
	'id' => 'blog_tags',
	'value' => $vars['tags']
));

$access_label = elgg_echo('access');
$access_input = elgg_view('input/hidden', array('name' => 'access_id', 'value' => '1')
);

$categories_input = elgg_view('input/categories', $vars);

// hidden inputs
$container_guid_input = elgg_view('input/hidden', array('name' => 'container_guid', 'value' => elgg_get_page_owner_guid()));
$guid_input = elgg_view('input/hidden', array('name' => 'guid', 'value' => $vars['guid']));


echo <<<___HTML

$draft_warning

<div>
	$title_input
</div>

<!--
<div>
	<label for="blog_excerpt">$excerpt_label</label>
	$excerpt_input
</div>
-->

<div>
	<label for="blog_description">$body_label</label>
	$body_input
</div>

<!--
<div>
	<label for="blog_tags">$tags_label</label>
	$tags_input
</div>
-->
$categories_input
<div> $list
</div>
<div>	
	$comments_input
</div>

<div>	
	$access_input
</div>

<div>	
	$status_input
</div>


<div class="elgg-foot">
	<div class="elgg-subtext mbm">
	$save_status <span class="blog-save-status-time">$saved</span>
	</div>

	$guid_input
	$container_guid_input

	$action_buttons
</div>

___HTML;
