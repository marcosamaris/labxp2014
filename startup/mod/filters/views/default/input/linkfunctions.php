<?php


/**
 * Categories input view
 *
 * @package ElggCategories
 *
 * @uses $vars['entity'] The entity being edited or created
 */


$functions = elgg_get_site_entity()->filters_functions;
if (empty($functions)) {
	$functions = array();
}


if (!empty($functions)) {
	if (!is_array($functions)) {
		$functions = array($functions);
	}
	
	// checkboxes want Label => value, so in our case we need category => category
	$functions = array_flip($functions);
	array_walk($functions, create_function('&$v, $k', '$v = $k;'));

	?>
<div class="sidebar-nav">

	<h3 class="nav-title"><span class="nav-title-icon">&nbsp;</span><a href="#">All Functions</a></h3>

	<ul class="nav-s">
	<form id="myform">

	<?php 
	
	if (!empty($functions)) {
		if (!is_array($functions)) {
			$functions = array($functions);
		}

		foreach($functions as $function) {			
			echo '<li><a href="" name="functions_list" onclick="teste()" id="' . $function .'" class="functionsLink"> ' . $function . '</a>';
			echo '<input type="hidden"  value="' . $function .'" />';
			echo '</li> ';			 
		}
	}
		
	?>
	</form >
	</ul>
</div>
	
<?php 	
}

