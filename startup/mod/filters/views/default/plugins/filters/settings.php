<?php
/**
 * Administrator sets the categories for the site
 *
 * @package ElggCategories
 */

// Get site categories
$site = elgg_get_site_entity();
$filters = $site->filters;

if (empty($filters)) {
	$filters = array();
}

?>
<div>
	<p><?php echo elgg_echo('filters:explanation'); ?></p>
	<p><?php echo elgg_echo('filters:functions'); ?></p>
<?php
	echo elgg_view('input/tags', array('value' => $filters, 'name' => 'filters_functions'));
?>
<p><?php echo elgg_echo('filters:spaces'); ?></p>
<?php
	echo elgg_view('input/tags', array('value' => $filters, 'name' => 'filters_spaces'));
?>
</div>