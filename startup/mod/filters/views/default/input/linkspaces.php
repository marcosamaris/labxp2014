<?php

//elgg_load_js('elgg.filters');	
/**
 * Categories input view
 *
 * @package ElggCategories
 *
 * @uses $vars['entity'] The entity being edited or created
 */


$spaces = elgg_get_site_entity()->filters_spaces;
if (empty($spaces)) {
	$spaces = array();
}

if (!empty($spaces) ) {
	if (!is_array($spaces)) {
		$spaces = array($spaces);
	}

	// checkboxes want Label => value, so in our case we need category => category
	$spaces = array_flip($spaces);
	array_walk($spaces, create_function('&$v, $k', '$v = $k;'));
}

if (!empty($spaces)) {
	if (!is_array($spaces)) {
		$spaces = array($spaces);
	}
	
	// checkboxes want Label => value, so in our case we need category => category
	$spaces = array_flip($spaces);
	array_walk($spaces, create_function('&$v, $k', '$v = $k;'));
	?>
	
	
<div class="sidebar-nav">

	<h3 class="nav-title"><span class="nav-title-icon">&nbsp;</span><a class="active" href="#" > All Spaces</a></h3>

	<ul class="nav-s">
		
	<?php 
	$linkstr = '';
	if (!empty($spaces)) {
		if (!is_array($spaces)) {
			$spaces = array($spaces);
		}
		foreach($spaces as $space) {
			echo '<li><a href="" onclick="teste()" id="' . $space .'" class="spacesLink"> ' . $space . '</a>';
			echo '<input type="hidden" name="functions_list[]" value="' . $space .'" />';
			echo '</li> ';		 
		}		
	}
	?>
	
	</ul>
	</div>
	
<?php 
}
?>
