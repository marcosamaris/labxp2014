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
 
elgg_register_event_handler('init', 'system', 'firstlogin_redirect'); 
require_once(elgg_get_plugins_path().'firstlogin_redirect/classes/firstlogin_redirect.php');
function firstlogin_redirect() {
  $firstlogin = new FirstLoginRedirect;
  $firstlogin->init();
}