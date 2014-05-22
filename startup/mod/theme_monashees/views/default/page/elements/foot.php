<?php

//echo elgg_view('footer/analytics'); 


if(elgg_get_context() != 'admin'){
	echo '<footer class="footer-wrapper clearfix">
	<div class="container">
		<p class="logoimg"><img src="'. elgg_get_site_url().'/mod/theme_monashees/vendors/plus-network/images/footer-logo.jpg" alt=" " /></p>
		<p>Plus Network is the online platform connecting the Monashees\' community. Monashees Capital &copy; 2014 All rights reserved.</p>
		<p>Should you have any questions or comments, please contact <a href="mailto:cferreria@monashees.com.br">Camila Ferreira</a></p>
	</div>
</footer>';	
}


$js = elgg_get_loaded_js('footer');
foreach ($js as $script) { ?>
	<script type="text/javascript" src="<?php echo $script; ?>"></script>
<?php
}

?>