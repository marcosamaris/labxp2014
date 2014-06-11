<?php
/**
 * Categories input view
 *
 * @package ElggCategories
 *
 * @uses $vars['entity'] The entity being edited or created
 */

/*if (isset($vars['entity']) && $vars['entity'] instanceof ElggEntity) {
	$selected_categories = $vars['entity']->universal_categories;
}*/

// use sticky values if set
/*if (isset($vars['universal_categories_list'])) {
	$selected_categories = $vars['universal_categories_list'];
}*/

$functions = elgg_get_site_entity()->filters_functions;
if (empty($functions)) {
	$functions = array();
}
/*if (empty($selected_categories)) {
	$selected_categories = array();
}*/

if (!empty($functions)) {
	if (!is_array($functions)) {
		$functions = array($functions);
	}
	
	// checkboxes want Label => value, so in our case we need category => category
	$functions = array_flip($functions);
	array_walk($functions, create_function('&$v, $k', '$v = $k;'));

	?>
	
	
	
	<?php
		echo elgg_view('input/dropdown_register', array(
			'value' => '',
			'name' => 'main functions',
			'options_values' => $functions

		));
	?>
		
	<?php
} 


$spaces = elgg_get_site_entity()->filters_spaces;
if (empty($spaces)) {
	$spaces = array();
}
/*if (empty($selected_categories)) {
 $selected_categories = array();
}*/

if (!empty($spaces)) {
	if (!is_array($spaces)) {
		$spaces = array($spaces);
	}

	// checkboxes want Label => value, so in our case we need category => category
	$spaces = array_flip($spaces);
	array_walk($spaces, create_function('&$v, $k', '$v = $k;'));

	?>

	
	<?php
	
		echo elgg_view('input/dropdown_register', array(
			'value' => '',
			'name' => 'main spaces',
			'options_values' => $spaces
			
		));

	?>
	
	
	<?php
	
		echo elgg_view('input/dropdown_register', array(
			'value' => '',
			'name' => 'role',
			#'options_values' => $spaces
			
		));

	?>
	

  	<input type="text" class="form-control" placeholder="Your Company's Mail"></input>

		
	<?php

} 
?>