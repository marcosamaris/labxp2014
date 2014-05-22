<?php
/**
 * Elgg topbar
 * The standard elgg top toolbar
 */
$logo_url = elgg_get_site_url() . "mod/theme_monashees/vendors/plus-network/images/logo2.jpg";
echo '<div class="logo col-lg-2">
		<a href="'.elgg_get_site_url() .'">
        <img src="'.$logo_url.'" title=\"Plus-Network\" alt=\"Plus-Network\"  class=\"img-responsive\" />
        </a>
      </div>';

$user = elgg_get_logged_in_user_entity();


echo '<div class="welcome-blcok">
		<div class="wel-c">
			<div class="user-avatar">
				<img alt="mask" src="'.$user->getIconURL('small').'">
			</div>
			<div class="txt">
				<p class="welcome-txt"><strong>'.elgg_echo('welcome').',</strong> '.$user->name.'</p>
				<p>';

				if(elgg_is_admin_logged_in () == true)
				{
					echo '<a href="'.elgg_get_site_url() .'admin">'.elgg_echo('admin').'</a> <span> | </span>';
				}
				
				
				echo ' <a href="'.elgg_get_site_url() .'settings/user/'.$user->username.'">'.elgg_echo('settings').'</a> <span>';
				echo '|</span> <a href="'.elgg_get_site_url() .'action/logout">'.elgg_echo('logout').' </a>';
				
				
echo '			</p>
			</div>
			
		</div>
	</div>';





// Elgg logo
//echo elgg_view_menu('topbar', array('sort_by' => 'priority', array('elgg-menu-hz')));

// elgg tools menu
// need to echo this empty view for backward compatibility.
/*$content = elgg_view("navigation/topbar_tools");
if ($content) {
	elgg_deprecated_notice('navigation/topbar_tools was deprecated. Extend the topbar menus or the page/elements/topbar view directly', 1.8);
	echo $content;
}
*/
