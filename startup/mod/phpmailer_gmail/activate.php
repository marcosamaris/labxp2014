<?php
/**
 * Set default plugin settings for phpmailer_gmail
 */

$plugin = elgg_get_plugin_from_id('phpmailer_gmail');
if ($plugin) {

	$defaults = array(
		'phpmailer_gmail_override' => 'enabled',
		'phpmailer_gmail_smtp' => 1,
		'phpmailer_gmail_host' => 'smtp.gmail.com',
		'phpmailer_gmail_smtp_auth' => 0,
		'phpmailer_gmail_username' => '',
		'phpmailer_gmail_password' => '',
		'ep_phpmailer_gmail_ssl' => 0,
		'ep_phpmailer_gmail_port' => 587,
		'nonstd_mta' => 0,
	);

	foreach ($defaults as $name => $value) {
		if (!isset($plugin->$name)) {
			$plugin->$name = $value;
		}
	}
}
