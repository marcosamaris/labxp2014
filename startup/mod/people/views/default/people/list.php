<?php
/**
 * Gallery view
 *
 * Implemented as an unorder list
 *
 * @uses $vars['items']         Array of ElggEntity or ElggAnnotation objects
 * @uses $vars['offset']        Index of the first list item in complete list
 * @uses $vars['limit']         Number of items per page
 * @uses $vars['count']         Number of items in the complete list
 * @uses $vars['pagination']    Show pagination? (default: true)
 * @uses $vars['position']      Position of the pagination: before, after, or both
 * @uses $vars['full_view']     Show the full view of the items (default: false)
 * @uses $vars['gallery_class'] Additional CSS class for the <ul> element
 * @uses $vars['item_class']    Additional CSS class for the <li> elements
 */

$items = $vars['items'];
if (!is_array($items) || sizeof($items) == 0) {
	return true;
}

elgg_push_context('gallery');

$offset = $vars['offset'];
$limit = $vars['limit'];
$count = $vars['count'];
$pagination = elgg_extract('pagination', $vars, true);
$offset_key = elgg_extract('offset_key', $vars, 'offset');
$position = elgg_extract('position', $vars, 'after');




$nav = '';
if ($pagination && $count) {
	$nav .= elgg_view('navigation/pagination', array(
		'offset' => $offset,
		'count' => $count,
		'limit' => $limit,
		'offset_key' => $offset_key,
	));
}

if ($position == 'before' || $position == 'both') {
	echo $nav;
}

?>
<div class="row">
<div class="col-lg-4">
<div class="form-group">
<?php echo elgg_view('input/companies',$vars);?>
</div>
</div>
</div>
<div class="row grid-view active">
	<?php
		foreach ($items as $item) {


$icon_url = elgg_format_url($item->getIconURL('medium'));
	?>
			
			<div class="col-lg-4 col-sm-6">
				<div class="detail clearfix">
                            <div class="col-lg-12 description">
                                <div class="avatar col-lg-12">
                                    <img src="<?php echo $icon_url;?>" alt="#">
                                    
                                </div>    
                                <div class="avatar-detail col-lg-12">
                                    <h3><?php echo $item->name;?></h3>
                                    <p><?php echo $item->role;?></p>
                                    <p><?php echo $item->company;?></p>
                                </div>
                                
                            </div>
                                                
                        </div>
			</div>
			<?php 		
			
		}
	?>

     
                        
    

</div>
                


<?php
if ($position == 'after' || $position == 'both') {
	echo $nav;
}

elgg_pop_context();
