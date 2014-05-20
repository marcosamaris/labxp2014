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

$spaces = elgg_get_site_entity()->filters_spaces;
if (empty($spaces)) {
	$spaces = array();
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

	<ul class="analytic-list">
		<li><a class="active" href="#"> All Functions</a></li>

	<?php 
	$linkstr = '';
	if (!empty($functions)) {
		if (!is_array($functions)) {
			$functions = array($functions);
		}
		foreach($functions as $function) {			
			$linkstr .= '<li><a href="#" id="' . $function .'" class="functionsLink"> ' . $function . '</a></li> ';			 
		}
		$linkstr .= '</ul>';
	}
	if ($linkstr) {
		echo '<p class="elgg-output-categories">' . "$linkstr</p>";
	}
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

	<ul class="analytic-list">
		<li><a class="active" href="#" > <?php $GLOBALS['FunctionsGlobal']  ?> All Spaces</a></li>
	<?php 
	$linkstr = '';
	if (!empty($spaces)) {
		if (!is_array($spaces)) {
			$spaces = array($spaces);
		}
		foreach($spaces as $space) {
			$link = elgg_get_site_url() . 'home/list?spaces=' . urlencode($space);
			$linkstr .= '<li><a href="' . $link .'"> ' . $space . '</a></li> ';			 
		}
		$linkstr .= '</ul>';
	}
	if ($linkstr) {
		echo '<p class="elgg-output-categories">' . "$linkstr</p>";
	}
}
?>
<script>			
$(".functionsLink").click(function () {
	val = $(this).attr("id");
	alert(val);
    window.location.href = "http://localhost/labxp2014/startup/home/mod/home/index.php?Functions=" + val;

    //window.location.href = "index.php?Functions=" + $(this).attr("id"));
});

</script>