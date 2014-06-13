<?php
/**
 * Elgg topbar
 * The standard elgg top toolbar
 */

$logo_url = elgg_get_site_url() . "mod/theme_monashees/vendors/plus-network/images/logo2.png";
echo '<div class="logo col-lg-2">
		<a href="'.elgg_get_site_url() .'">
        <img src="'.$logo_url.'" title=\"Plus-Network\" alt=\"Plus-Network\"  class=\"img-responsive\" />
        </a>
      </div>';

echo '
<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>';

//need to check if the user is logged because this topbar can be always loaded if the site is public
$user = elgg_get_logged_in_user_entity();

if(elgg_is_logged_in() && ($user->permission == 'allowed' || elgg_is_admin_logged_in())){

	$user = elgg_get_logged_in_user_entity();
	
	
	echo '<div class="welcome-blcok">
			<div class="wel-c">
				<div class="user-avatar">';
	
	
	
				if (elgg_is_active_plugin('profile')) {
					echo '<a href="'.elgg_get_site_url().'profile/'.$user->username.'">';
				}
						echo '<img alt="mask" src="'.$user->getIconURL('small').'">';
						
				if (elgg_is_active_plugin('profile')) {
					echo '</a>';	
				}
	
	
	
				
	echo 		'</div>
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

}


