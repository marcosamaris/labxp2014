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


?>

<div class="row">
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
        <p class="text"><?php echo elgg_echo('advisors:message_help');?><!--<a href="#" class="list-view active">listview</a> <a href="#" class="grid-view">gridview</a> --></p>
    </div>
	<div class="col-lg-8 col-md-6" id="list-view">
		<?php
			
			if (isset($vars['content'])) {
				echo $vars['content'];
			}
		?>
	</div>
		
</div>
