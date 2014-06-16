<?php
/**
 * PHPMailer plugin settings
 */

// override Elgg mail handler
echo '<div>';
$checked = $vars['entity']->phpmailer_override != 'disabled' ? 'checked' : false;
echo elgg_view('input/checkbox', array(
	'name' => 'params[phpmailer_gmail_override]',
	'value' => 'enabled',
	'checked' => $checked,
	'default' => 'disabled',
));
echo ' ' . elgg_echo('phpmailer_gmail:override') . '</div>';

// SMTP Settings
echo '<fieldset class="elgg-border-plain mbm pas">';
echo '<div>';
$checked = $vars['entity']->phpmailer_gmail_smtp ? 'checked' : false;
echo elgg_view('input/checkbox', array(
	'name' => 'params[phpmailer_gmail_smtp]',
	'value' => 1,
	'checked' => $checked,
	'default' => 0,
	'id' => 'phpmailer-gmail-smtp',
));
echo ' ' . elgg_echo('phpmailer_gmail:smtp') . '<br/>';

echo elgg_echo('phpmailer_gmail:host') . ': ';
echo elgg_view('input/text', array(
	'name' => 'params[phpmailer_gmail_host]',
	'value' => $vars['entity']->phpmailer_gmail_host,
	'class' => 'phpmailer-gmail-smtp elgg-input-natural',
));

echo '<br /><br />';
$checked = $vars['entity']->phpmailer_gmail_smtp_auth ? 'checked' : false;
echo elgg_view('input/checkbox', array(
	'name' => 'params[phpmailer_gmail_smtp_auth]',
	'value' => 1,
	'checked' => $checked,
	'default' => 0,
	'class' => 'phpmailer-gmail-smtp',
	'id' => 'phpmailer-gmail-smtp-auth',
));
echo ' ' . elgg_echo('phpmailer_gmail:smtp_auth') . '<br/>';

echo elgg_echo('phpmailer_gmail:username') . ': ';
echo elgg_view('input/text', array(
	'name' => 'params[phpmailer_gmail_username]',
	'value' => $vars['entity']->phpmailer_gmail_username,
	'class' => 'phpmailer-gmail-smtp phpmailer-gmail-smtp-auth elgg-input-natural',
));

echo '<br />';
echo elgg_echo('phpmailer_gmail:password') . ':';
echo elgg_view('input/password', array(
	'name' => 'params[phpmailer_gmail_password]',
	'value' => $vars['entity']->phpmailer_gmail_password,
	'class' => 'phpmailer-gmail-smtp phpmailer-gmail-smtp-auth elgg-input-natural mts',
));
echo '</div>';

 // tls connection for smtp (with port info)
echo '<div>';
$checked = $vars['entity']->ep_phpmailer_gmail_tls ? 'checked' : false;
echo elgg_view('input/checkbox', array(
	'name' => 'params[ep_phpmailer_gmail_tls]',
	'value' => 1,
	'checked' => $checked,
	'default' => 0,
	'class' => 'phpmailer-gmail-smtp',
	'id' => 'phpmailer-gmail-tls',
));
echo ' ' . elgg_echo('phpmailer_gmail:tls') . '<br/>';

echo elgg_echo('phpmailer_gmail:port') . ':';
echo elgg_view('input/text', array(
	'name' => 'params[ep_phpmailer_gmail_port]',
	'value' => $vars['entity']->ep_phpmailer_gmail_port,
	'class' => 'phpmailer-gmail-smtp phpmailer-gmail-tls elgg-input-natural',
));
echo '</div>';
echo '</fieldset>';

// Non-standard MTA setting
echo '<div>';
$checked = $vars['entity']->nonstd_mta ? 'checked' : false;
echo elgg_view('input/checkbox', array(
	'name' => 'params[nonstd_mta]',
	'value' => 1,
	'checked' => $checked,
	'default' => 0,
));
echo ' ' . elgg_echo('phpmailer_gmail:nonstd_mta');
echo '</div>';

?>

<script type="text/javascript">
	$(document).ready(function() {
		phpmailer_gmail_form_update();

		$('#phpmailer-gmail-smtp').change(phpmailer_gmail_form_update);
		$('#phpmailer-gmail-smtp-auth').change(phpmailer_gmail_form_update);
		$('#phpmailer-gmail-tls').change(phpmailer_gmail_form_update);
	});

	function phpmailer_gmail_form_update() {
		if ($('#phpmailer-gmail-tls').attr('checked')) {
			$('.phpmailer-gmail-tls').removeAttr('disabled');
		}
		if ($('#phpmailer-gmail-smtp-auth').attr('checked')) {
			$('.phpmailer-gmail-smtp-auth').removeAttr('disabled');
		}

		if (!$('#phpmailer-gmail-smtp').attr('checked')) {
			$('.phpmailer-gmail-smtp').attr('disabled', 'disabled');
		} else {
			$('.phpmailer-gmail-smtp').removeAttr('disabled');
		}

		if (!$('#phpmailer-gmail-smtp-auth').attr('checked')) {
			$('.phpmailer-gmail-smtp-auth').attr('disabled', 'disabled');
		}
		if (!$('#phpmailer-gmail-tls').attr('checked')) {
			$('.phpmailer-gmail-tls').attr('disabled', 'disabled');
		}
	}
</script>
