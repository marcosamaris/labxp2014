<?php
/**
 * View for blog objects
 *
 * @package Blog
 */

$full = elgg_extract('full_view', $vars, FALSE);
$home = elgg_extract('entity', $vars, FALSE);

if (!$home) {
	return TRUE;
}

$owner = $home->getOwnerEntity();
$container = $home->getContainerEntity();
$categories = elgg_view('output/filters_list', $vars);
$excerpt = $home->excerpt;
if (!$excerpt) {
//	$excerpt = elgg_get_excerpt($home->description); //limit for the number of characters exhibit
    $excerpt = $home->description;
}


$owner_icon = elgg_view_entity_icon($owner, 'small', $vars);
$owner_link = elgg_view('output/url', array(
	'href' => "home/owner/$owner->username",
	'text' => $owner->name,
	'is_trusted' => true,
));


$user = elgg_get_logged_in_user_entity();

$image = "";
if (elgg_is_active_plugin('profile') && ($user->permission == 'allowed' || elgg_is_admin_logged_in())) {
    $image .= '<a href="'.elgg_get_site_url().'profile/'.$owner->username.'">';
}

$image .= '<img alt="mask" src="'.$owner->getIconURL('small').'">';

if (elgg_is_active_plugin('profile') && ($user->permission == 'allowed' || elgg_is_admin_logged_in())) {
    $image .= '</a>';
}



$author_text = elgg_echo('byline', array($owner_link));
$date = elgg_view_friendly_time($home->time_created);

// The "on" status changes for comments, so best to check for !Off
if ($home->comments_on != 'Off') {
	$comments_count = $home->countComments();
	//only display if there are commments
	if ($comments_count != 0) {
		$text = elgg_echo("comments") . " ($comments_count)";
		/*$comments_link = elgg_view('output/url', array(
			'href' => $home->getURL() . '#home-comments', //change to see all thread
			'text' => $text,
			'is_trusted' => true,
		));*/
		$comments_link = " - ".$text;
	} else {
		$comments_link = '';
	}
} else {
	$comments_link = '';
}

$metadata = elgg_view_menu('home', array(
	'entity' => $vars['entity'],
	'handler' => 'home',
	'sort_by' => 'priority',
	'class' => 'elgg-menu-hz',
));



$subtitle = "$author_text $date $comments_link $categories";

// do not show the metadata and controls in widget view
if (elgg_in_context('widgets')) {
	$metadata = '';
}



if ($full) {

	$body = elgg_view('output/longtext', array(
		'value' => $home->description,
		'class' => 'blog-post',
	));

	$params = array(
		'entity' => $home,
		'title' => false,
		'metadata' => $metadata,
		'subtitle' => $subtitle,
	);
	$params = $params + $vars;
	$summary = elgg_view('object/elements/summary', $params);

	echo elgg_view('object/elements/full', array(
		'summary' => $summary,
		'icon' => $owner_icon,
		'body' => $body,
	));

} else {
	// brief view
	$responses = elgg_view('input/responses', $vars);
	
	
	$params = array(
		
		'metadata' => $metadata,
		'subtitle' => $subtitle,
		'content' => $excerpt.$responses,
	);
	$params = $params + $vars;
	//$list_body = elgg_view('object/elements/summary_home', $params);

	$vars = array(
		'image' => $image,
	    'entity' => $home,
	    'content' => $excerpt,
	    'responses' => $responses,
	    'metadata' => $metadata,
	    'comment_count' => $home->countComments(),
	    'id'=> $home->getGUID(),
	);
	
	
	
	echo elgg_view('page/components/image_block_home', $vars);
	
}
