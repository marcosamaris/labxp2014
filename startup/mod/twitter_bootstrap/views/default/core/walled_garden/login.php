<?php
/**
 * Walled garden login
 */

$title = elgg_get_site_entity()->name;
$welcome = elgg_echo('walled_garden:welcome');
$welcome .= ': <br/>' . $title;

$menu = elgg_view_menu('walled_garden', array(
	'sort_by' => 'priority',
	'class' => 'elgg-menu-general elgg-menu-hz',
));

$login_box = elgg_view('core/account/login_box', array('module' => 'walledgarden-login'));

$login_box = elgg_view('core/account/login_box');

echo <<<HTML
<div class="elgg-col elgg-col-1of2">
	<div class="elgg-inner">
		
			<img class="logo-img img-responsive" src="./_graphics/logo.png" alt="monashees">
		
		<!--$menu-->
	</div>
</div>
<div class="elgg-col elgg-col-1of2">
	<div class="elgg-inner" id="login-monashees">
		$login_box
	</div>
</div>
HTML;
