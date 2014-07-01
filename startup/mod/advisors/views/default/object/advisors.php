<?php
/**
 * View for advisors objects
 *
 * @package Advisors
 */
$advisors = elgg_extract ( 'entity', $vars, FALSE );

if (! $advisors) {
    return TRUE;
}

// return an advisor's spaces and functions
$functions = elgg_view ( 'output/functions_list', $vars );
$spaces = elgg_view ( 'output/spaces_list', $vars );

// Settings for the advisor's photo
$advisors->setUrl ( '/advisors/upload?guid=' . $advisors->getGUID () );
$url = (empty ( $advisors->advisorimage )) ? "_graphics/icons/user/defaultsmall.gif" : $advisors->advisorimage;
$advisors->setIcon ( $url );
$vars ['title'] = "Click here to upload a photo to {$advisors->advisorname}";
$advisor_icon = elgg_view_entity_icon ( $advisors, 'tiny', $vars );

// checking the context for change the layout
if (elgg_get_context () != 'admin') {
    
    // context of site
    $metadata = "";
    
    $advisors->setIcon ( $advisors->advisorimage );
    
    $params = array (
            'title' => $advisors->advisorname,
            'description' => $advisors->advisordescription,
            'entity' => $advisors,
            'metadata' => $metadata,
            'email' => $advisors->advisoremail,
            'skype' => $advisors->advisorskype,
            'googleplus' => $advisors->advisorgoogleplus,
            'linkedin' => $advisors->advisorlinkedin,
            'twitter' => $advisors->advisortwitter,
            'facebook' => $advisors->advisorfacebook,
            'avatar' => $url,
            'bookofficehours' => $advisors->advisorbookofficehours 
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
    
    $content = "<b>{$advisors->advisorname}</b>: {$advisors->advisordescription}";
    $content .= "<br>Book Office Hours: {$advisors->advisorbookofficehours}";
    $content .= "<br>E-mail: {$advisors->advisoremail}";
    $content .= "<br>Skype: {$advisors->advisorskype}";
    $content .= "<br>LinkedIn: {$advisors->advisorlinkedin}";
    $content .= "<br>Google Plus: {$advisors->advisorgoogleplus}";
    $content .= "<br>Twitter: {$advisors->advisortwitter}";
    $content .= "<br>Facebook: {$advisors->advisorfacebook}";
    
    $content .= "<br>Functions: {$functions}";
    $content .= "<br>Spaces: {$spaces}";
    
    $params = array (
            'content' => $content,
            'entity' => $advisors,
            'metadata' => $metadata,
            'subtitle' => "",
            'title' => "" 
    );
    
    $params = $params + $vars;
    $list_body = elgg_view ( 'object/elements/summary', $params );
    
    echo elgg_view_image_block ( $advisor_icon, $list_body );
}
?>