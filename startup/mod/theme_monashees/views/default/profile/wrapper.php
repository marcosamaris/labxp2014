<?php
/**
 * Profile info box
 */
$user = elgg_get_page_owner_entity ();

$image = "";
if (elgg_is_active_plugin ( 'profile' ) && ($user->permission == 'allowed' || elgg_is_admin_logged_in ())) {
    $image .= '<a href="' . elgg_get_site_url () . 'profile/' . $user->username . '">';
}

$image .= '<img alt="mask" src="' . $user->getIconURL ( 'small' ) . '">';

if (elgg_is_active_plugin ( 'profile' ) && ($user->permission == 'allowed' || elgg_is_admin_logged_in ())) {
    $image .= '</a>';
}

$briefdescription = "";
$profile_fields = elgg_get_config ( 'profile_fields' );
if (is_array ( $profile_fields ) && sizeof ( $profile_fields ) > 0) {
    $briefdescription = $user->briefdescription;
}

?>



<div class="detail clearfix">
	<div class="col-lg-8 col-xs-12 description">
		<div class="avatar4">
    		<?php echo $image;?>
        </div>
		<div class="avatar-detail4">
			<h3><?php echo $user->name;?></h3>
			<p class="designation"><?php echo elgg_view('output/longtext', array('value' => $briefdescription, 'class' => 'mtn'));?></p>
			<p class="function">
				<span>Function</span><?php echo $user->functions;?></p>
			<p class="function">
				<span>Space</span><?php echo $user->spaces;?></p>
			<p class="function">
				<span>Role</span><?php echo $user->role;?></p>


		</div>

	</div>
	<div class="col-lg-4 col-xs-12 detail-bt">
		<div class="c-logo2">
			<!--  <img src="images/eduk2.jpg" alt="#" />-->
            <?php echo $user->company;?>
        </div>
		<div class="social-icon social2">
			<a title="" data-content="<?php echo $user->company_email;?>" data-placement="top" data-toggle="popover" class="mailto link-popover" href="#" data-original-title="E-mail">mail</a>
			<a title="" data-content="<?php echo $user->skype;?>" data-placement="top" data-toggle="popover" class="skype link-popover" href="#" data-original-title="Skype">Skype</a>
			<a title="" data-content="<?php echo $user->linkedin;?>" data-placement="top" data-toggle="popover" class="linkedin link-popover" href="#" data-original-title="LinkedIn">LinkedIn</a>	
			<a title="" data-content="<?php echo $user->googleplus;?>" data-placement="top" data-toggle="popover" class="googleplus link-popover" href="#" data-original-title="Google+">Google Plus</a> 
			<a title="" data-content="<?php echo $user->twitter;?>" data-placement="top" data-toggle="popover" class="twitter link-popover" href="#" data-original-title="Twitter">Twitter</a>	
			<a title="" data-content="<?php echo $user->facebook;?>" data-placement="top" data-toggle="popover" class="facebook link-popover" href="#" data-original-title="Facebook">Facebook</a>
		</div>
	</div>
</div>

<?php 
/*
// if admin, display admin links
$admin_links = '';
$admin = elgg_extract('admin', $menu, array());

if (elgg_is_admin_logged_in() && elgg_get_logged_in_user_guid() != elgg_get_page_owner_guid()) {
	$text = elgg_echo('admin:options');

	$admin_links = '<ul class="profile-admin-menu-wrapper">';
	$admin_links .= "<li><a rel=\"toggle\" href=\"#profile-menu-admin\">$text&hellip;</a>";
	$admin_links .= '<ul class="profile-admin-menu" id="profile-menu-admin">';
	foreach ($admin as $menu_item) {
		$admin_links .= elgg_view('navigation/menu/elements/item', array('item' => $menu_item));
	}
	$admin_links .= '</ul>';
	$admin_links .= '</li>';
	$admin_links .= '</ul>';	


?> 
	<div class="detail clearfix">
    <?php echo $admin_links;?>
    </div>
<?php 
}
?>
*/?>

