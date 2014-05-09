<?php

/**

* Main activity stream list page

*/



//if (elgg_is_admin_logged_in()) {



$options = array();


$page_type = preg_replace('[\W]', '', get_input('page_type', 'all'));
$type = preg_replace('[\W]', '', get_input('type', 'all'));
$active_section =
$subtype = preg_replace('[\W]', '', get_input('subtype', ''));

if ($subtype) {

	$selector = "type=$type&subtype=$subtype";

} else {

	$selector = "type=$type";

}



if ($type != 'all') {

	$options['type'] = $type;

	if ($subtype) {

		$options['subtype'] = $subtype;

	}

}



switch ($page_type) {

	case 'mine':

		$title = elgg_echo('river:mine');

		$page_filter = 'mine';

		$options['subject_guid'] = elgg_get_logged_in_user_guid();

		break;

	case 'friends':

		$title = elgg_echo('river:friends');

		$page_filter = 'friends';

		$options['relationship_guid'] = elgg_get_logged_in_user_guid();

		$options['relationship'] = 'friend';

		break;

	default:

		$title = elgg_echo('river:all');

		$page_filter = 'all';

		break;

}

// set the title
// for distributed plugins, be sure to use elgg_echo() for internationalization
$title = "Home";

// start building the main column of the page
$content = elgg_view_title($title);

// add the form to this section
$content .= elgg_view_form("home/save");

// optionally, add the content for the sidebar
$sidebar = "";

// layout the page
$body = elgg_view_layout('content', array(
		'content' => $content,
		'sidebar' => $sidebar
));

$action = 'create';

$activity = elgg_list_river($options);


//$content .= elgg_view('core/river/filter', array('selector' => $selector));



//$sidebar = elgg_view('core/river/sidebar');



$params = array(

		'content' =>  $content . $activity,

		'filter_context' => $page_filter,

		'class' => 'elgg-river-layout',

);


$body = elgg_view_layout('content', $params);




echo elgg_view_page($title, $body);