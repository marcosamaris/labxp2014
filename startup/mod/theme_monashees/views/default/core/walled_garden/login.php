<?php


$login_box = elgg_view('core/account/login_box', array('module' => 'walledgarden-login'));


echo <<<HTML
<section class="col-lg-12 col-sm-12 login">
	<a href="#" class="login-logo">
		<img src="mod/theme_monashees/vendors/plus-network/images/logo.jpg" alt="Plus Network" />
	</a>

	<div class="login-block">
		<p class="login-text">Please sign in to continue</p>
		<button class="linkedin-bt">
		<span class="icon"><img src="mod/theme_monashees/vendors/plus-network/images/linkdin-icon.png" alt="linkedin" /></span>
		<span>Sign in with LinkedIn</span>
		</br>
		
		</button>
		<p>$login_box</p>
	</div>
		
</section>
HTML;
