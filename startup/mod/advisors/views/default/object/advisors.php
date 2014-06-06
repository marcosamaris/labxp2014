<?php
/**
 * View for blog objects
 *
 * @package Blog
 */


$advisors = elgg_extract('entity', $vars, FALSE);

if (!$advisors) {
	return TRUE;
}


//return  an advisor's spaces and functions
$categories = elgg_view('output/filters_list', $vars);


// TODO: ARRUMAR A FOTO
$owner = $advisors->getOwnerEntity();
$owner_icon = elgg_view_entity_icon($owner, 'tiny');
$owner_link = elgg_view('output/url', array(
	'href' => "home/owner/$owner->username",
	'text' => $owner->name,
	'is_trusted' => true,
));

/*
//Menu of functions for delete an advisor
$metadata = elgg_view_menu('entity', array(
	'entity' => $vars['entity'],
	'handler' => 'advisors',
	'sort_by' => 'priority',
	'class' => 'elgg-menu-hz',
));

*/
$metadata = "";



	
	$params = array(
		'title' => $advisors->advisorname,
		'description'=> $advisors->advisordescr,
		'entity' => $advisors,
		'metadata' => $metadata,
		'email' => $advisors->advisoremail,
		'skype' => $advisors->advisorskype,
		'googleplus' => $advisors->advisorplus,
		'linkedin' => $advisors->advisorlinkedin,
		'twitter'=> $advisors->advisortwitter,
		'facebook' => $advisors->advisorfb				
	);
	

	

	//echo elgg_view_image_block($owner_icon, $list_body);
	echo elgg_view('object/elements/advisor', $params);

