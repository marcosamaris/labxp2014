<?php
/**
 * Elgg page header
 * In the default theme, the header lives between the topbar and main content area.
 */

// link back to main site.
//echo elgg_view('page/elements/header_logo', $vars);

// drop-down login
//echo elgg_view('core/account/login_dropdown');

// insert site-wide navigation

$user = elgg_get_logged_in_user_entity();
if($user->permission == 'allowed'|| elgg_is_admin_logged_in()){

$vars['type_menu'] = 'header';

echo elgg_view_menu('site', $vars);


}