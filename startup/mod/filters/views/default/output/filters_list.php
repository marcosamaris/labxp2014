<?php
/**
 * View categories on an entity
 *
 * @uses $vars['entity']
 */

$linkstr = '';

$categories = elgg_get_site_entity()->filters_functions;



	//$categories = $vars['entity']->universal_categories;
	if (!empty($categories)) {
		if (!is_array($categories)) {
			$categories = array($categories);
		}
		foreach($categories as $category) {
			$link = elgg_get_site_url() . 'categories/list?category=' . urlencode($category);
			if (!empty($linkstr)) {
				$linkstr .= ', ';
			}
			$linkstr .= '<a href="'.$link.'">' . $category . '</a>';
		}
	}



if ($linkstr) {
	echo '<p class="elgg-output-categories">' . $linkstr."</p>";
}