<?php
/**
 * First Login Redirect
 *
 * @package   Informatikon.Elgg
 * @author    Informatikon Technologies <info@buddyexpress.net
 * @copyright 2014 BUDDYEXPRESS NETWORKS.
 * @license   Buddyexpress Public License http://www.buddyexpress.net/Licences/bpl/ (GPL V2)
 * @link      http://informatikon.com/
 */
class FirstLoginRedirect {
	
 public function getUrl(){
	global $FirstRedirect;
	require_once(elgg_get_plugins_path().'firstlogin_redirect/config.php');
	return $FirstRedirect;
 }
 public function init(){
	$user = elgg_get_logged_in_user_guid();
    $user = get_user($user); 
	if($user->last_action  == 0 
	                      && !elgg_is_admin_logged_in() 
						  && !elgg_in_context('profile_edit') 
						  && elgg_is_logged_in()){
	     forward($this->getUrl());	
	}
 }
 
}//CLASS