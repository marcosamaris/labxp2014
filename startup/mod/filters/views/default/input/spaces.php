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

	<td>
	<label><?php echo elgg_echo('filters:spaces'); ?></label><br />
	<?php
	
		echo elgg_view('input/dropdown', array(
			'value' => '',
			'name' => 'spaces',
			'options_values' => $spaces

		));
		echo elgg_view('input/dropdown', array(
		'value' => '',
		'name' => 'spaces1',
		'options_values' => $spaces

));
	?>
	</td>
	</tr>
	</table>
	<?php

} 
?>