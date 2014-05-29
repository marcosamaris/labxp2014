<?php
/**
 * Elgg 2 sidebar layout
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['content']     The content string for the main column
 * @uses $vars['sidebar']     Optional content that is displayed in the sidebar
 * @uses $vars['sidebar_alt'] Optional content that is displayed in the alternate sidebar
 * @uses $vars['class']       Additional class to apply to layout
 */

$class = 'row';

?>

<div class="<?php echo $class; ?>">
	<div class="col-lg-2 col-md-3">
		<?php
			echo elgg_view('page/elements/sidebar1', $vars);
		?>
	</div>
	<div class="col-lg-2 col-md-3">
		<?php
			echo elgg_view('page/elements/sidebar_alt1', $vars);
		?>
	</div>

	<div class="col-lg-8 col-md-6">
		<?php
			// @todo deprecated so remove in Elgg 2.0
			if (isset($vars['default'])) {
				echo $vars['default'];
			}
			if (isset($vars['content'])) {
				echo $vars['content'];
			}
		?>
	</div>
</div>
