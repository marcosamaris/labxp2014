<?php


$login_box = elgg_view('core/account/login_box', array('module' => 'walledgarden-login'));


echo '<section class="col-lg-12 col-sm-12 login">
	<a href="'.elgg_get_site_url().'" class="login-logo">
		<img src="mod/theme_monashees/vendors/plus-network/images/logo.jpg" alt="Plus Network" />
	</a>

	<div class="login-block">
		<p class="login-text">'.elgg_echo('monashees:login:message').'</p>';
		
echo elgg_view('forms/login_monashees');

echo '
		
		</br>
		
		</button>
        <p class="login-alternative-text">'.elgg_echo('alternative:login').'</p>
		'.$login_box.'
	</div>
		
</section>';
