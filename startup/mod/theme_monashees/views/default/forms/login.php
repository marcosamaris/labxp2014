<?php
/**
 * Elgg login form
 *
 * @package Elgg
 * @subpackage Core
 */
?>

	
<?php

echo elgg_view ( 'input/text', array (
        'name' => 'username',
        'class' => 'form-control',
        'type' => 'email',
        'autofocus' => "",
        'placeholder' => elgg_echo ( "email:placeholder" ) 
) );
?>
	
<?php 

echo elgg_view('input/password', array(
        'name' => 'password',
        'class' => 'form-control',
        'placeholder' => elgg_echo ( "password:placeholder" )
)); ?>




<?php echo elgg_view('login/extend', $vars); ?>

<div class="elgg-foot">


	
	<?php echo elgg_view('input/submit', array('value' => elgg_echo('login'), 'class' => 'btn btn-lg btn-primary btn-block')); ?>
	
	<?php
if (isset ( $vars ['returntoreferer'] )) {
    echo elgg_view ( 'input/hidden', array (
            'name' => 'returntoreferer',
            'value' => 'true' 
    ) );
}
?>

	<ul class="elgg-menu elgg-menu-general mtm">
	<?php
if (elgg_get_config ( 'allow_registration' )) {
    // echo '<li><a class="registration_link" href="' . elgg_get_site_url() . 'register">' . elgg_echo('register') . '</a></li>';
}
?>
		<li><a class="forgot_link"
				href="<?php echo elgg_get_site_url(); ?>forgotpassword">
			<?php //echo elgg_echo('user:password:lost'); ?>
		</a></li>
		</ul>
	</div>


