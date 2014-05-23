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
/*if (empty($selected_categories)) {
	$selected_categories = array();
}*/

$spaces = elgg_get_site_entity()->filters_spaces;
if (empty($spaces)) {
	$spaces = array();
}
/*if (empty($selected_categories)) {
 $selected_categories = array();
}*/


if (!empty($functions) && !empty($spaces)) {
	if (!is_array($functions)) {
		$functions = array($functions);
	}

	// checkboxes want Label => value, so in our case we need category => category
	$functions = array_flip($functions);
	array_walk($functions, create_function('&$v, $k', '$v = $k;'));

	if (!is_array($spaces)) {
		$spaces = array($spaces);
	}
		
	// checkboxes want Label => value, so in our case we need category => category
	$spaces = array_flip($spaces);
	array_walk($spaces, create_function('&$v, $k', '$v = $k;'));
	
	
	?>

<div class="categories">
	<label><?php echo elgg_echo('functions'); ?></label><br />
	<form id="myform">
	<?php
		echo elgg_view('input/checkboxes', array(
			'options' => $functions,
			'value' => $selected_categories,
			'name' => 'functions_list',
			'align' => 'vertical',
			'onclick' => 'teste()',
			'categories' => $vars['functions'],
		));

	?>
	<input type="hidden" name="universal_category_marker" value="on" />
	
	<label><?php echo elgg_echo('spaces'); ?></label><br />
	<?php
		echo elgg_view('input/checkboxes', array(
			'options' => $spaces,
			'value' => $selected_categories,
			'name' => 'spaces_list',
			'align' => 'vertical',
			'onclick' => 'teste()',
			'categories' => $vars['spaces'],	
		));

	?>
	<input type="hidden" name="universal_space_marker" value="on" />
	</form>
</div>
<script type="text/javascript">
	function teste(){
		document.forms["myform"].submit();
	}
</script>
	<?php

} else {
	echo '<input type="hidden" name="universal_category_marker" value="on" />';
}

