<?php
/**
 * View for blog objects
 *
 * @package Blog
 */
$advisors = elgg_extract ( 'entity', $vars, FALSE );

if (! $advisors) {
    return TRUE;
}

// return an advisor's spaces and functions
$categories = elgg_view ( 'output/filters_list', $vars );

// TODO: ARRUMAR A FOTO

$advisors->setUrl ( '/advisors/upload?guid=' . $advisors->getGUID () );

$url = (empty ( $advisors->advisorimage )) ? "_graphics/icons/default/tiny.png" : $advisors->advisorimage;

$advisors->setIcon ( $url );

$owner_icon = elgg_view_entity_icon ( $advisors, 'tiny', $vars );

if (elgg_get_context () != 'admin') {
    
    // context of site
    $metadata = "";
    
    $advisors->setIcon ( $advisors->advisorimage );
    
    $params = array (
            'title' => $advisors->advisorname,
            'description' => $advisors->advisordescr,
            'entity' => $advisors,
            'metadata' => $metadata,
            'email' => $advisors->advisoremail,
            'skype' => $advisors->advisorskype,
            'googleplus' => $advisors->advisorplus,
            'linkedin' => $advisors->advisorlinkedin,
            'twitter' => $advisors->advisortwitter,
            'facebook' => $advisors->advisorfb,
            'avatar' => $advisors->getIconURL () 
    );
    
    echo elgg_view ( 'object/elements/advisor', $params );
} else {
    
    // Menu of functions for delete an advisor
    $metadata = elgg_view_menu ( 'entity', array (
            'entity' => $vars ['entity'],
            'handler' => 'advisors',
            'sort_by' => 'priority',
            'class' => 'elgg-menu-hz' 
    ) );
    
    $name = $advisors->advisorname;
    $descrip = $advisors->advisordescr;
    $email = $advisors->advisoremail;
    $skype = $advisors->advisorskype;
    $plus = $advisors->advisorplus;
    $twitter = $advisors->advisortwitter;
    $fb = $advisors->advisorfb;
    $image = $advisors->advisorimage;
    $icon = $advisors->getIcon ();
    
    $content = $name . ': ' . $descrip;
    
    $params = array (
            'content' => $content,
            'entity' => $advisors,
            'metadata' => $metadata,
            'subtitle' => "",
            'title' => "" 
    );
    $params = $params + $vars;
    $list_body = elgg_view ( 'object/elements/summary', $params );
    
    echo elgg_view_image_block ( $owner_icon, $list_body );
}



	
	
	
	
	
	
	
	
	

