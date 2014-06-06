<?php
/**
 * View categories on an entity
 *
 * @uses $vars['entity']
 */

$linkstr = '';

//$categories = elgg_get_site_entity()->filters_functions;



	$functions = $vars['entity']->functions;
	if (!empty($functions)) {
		if (!is_array($functions)) {
			$functions = array($functions);
		}
		
		foreach($functions as $functions) {
			if (!empty($linkstr)) {
				$linkstr .= ', ';
			}
			
			$linkstr .=  $functions;
		}
	}
	$linkstr = $linkstr."<br>";
	$spaces = $vars['entity']->spaces;
	if (!empty($spaces)) {
		if (!is_array($spaces)) {
			$spaces = array($spaces);
		}
		
		
		foreach($spaces as $spaces) {
			
			$linkstr .=  $spaces;
		}
	}	


if ($linkstr) {
	echo '<p class="elgg-output-categories">' . $linkstr."</p>";
}