<?php 

$pluginLogin = 'elgg_social_login';
$pluginTheme = 'theme_monashees';

if (elgg_is_active_plugin($pluginLogin) && elgg_is_active_plugin($pluginTheme)) { 

	global $CONFIG;
	global $HA_SOCIAL_LOGIN_PROVIDERS_CONFIG;
	
	require_once(elgg_get_plugins_path() . "{$pluginLogin}/settings.php");	
	
	$pluginLoginBaseURL  = elgg_get_site_url() ."mod/".$pluginLogin."/";
	$pluginLoginBasePath  = elgg_get_plugins_path().$pluginLogin;
	
	$pluginThemeIconLinkedin = elgg_get_site_url() ."mod/theme_monashees/vendors/plus-network/images/linkdin-icon.png";
	
	
	foreach( $HA_SOCIAL_LOGIN_PROVIDERS_CONFIG AS $item ){
		$provider_id     = @ $item["provider_id"];
		$provider_name   = @ $item["provider_name"];
	
		
	
		if( elgg_get_plugin_setting( 'ha_settings_' . $provider_id . '_enabled', 'elgg_social_login' ) && strtolower($provider_id) == 'linkedin' ){
			?>
				
				
				<button class="linkedin-bt ha_connect_with_provider" provider="<?php echo $provider_id ?>">
				<span class="icon"><img src="<?php echo $pluginThemeIconLinkedin;?>" alt="<?php echo $provider_name ?>" title="<?php echo $provider_name ?>" /></span>
				<span>Sign in with LinkedIn</span>
				
				<?php
			} 
		} 
		
	echo '
	<input id="ha_popup_base_url" type="hidden" value="'.$pluginLoginBaseURL.'authenticate.php?" />
	<input id="ha_popup_base_path" type="hidden" value="'.$pluginLoginBasePath.'authenticate.php?" />';

?>

<script type="text/javascript">
$(function(){
	$(".ha_connect_with_provider").click(function(){
		popupurl = $("#ha_popup_base_url").val();
		popuppath = $("#ha_popup_base_path").val();
		provider = $(this).attr("provider");

		window.open(
		popupurl+"provider="+provider,
				"hybridauth_social_sing_on", 
				"location=1,status=0,scrollbars=0,width=800,height=570"
		);
	});
});
</script>




<?php }else { echo 'error';} ?>