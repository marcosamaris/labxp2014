<?php
/**
 * Like_comment plugin language pack
 *
 * @package Like_Comment Plugin
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Evobilis <info@evobilis.com>
 * @link http://evobilis.com/
 */


/*if (elgg_is_active_plugin('like_comment')){
    

$owner = get_user($vars['annotation']->owner_guid);
$loginuser = get_loggedin_user();

//$result = get_like_comment_string($vars['annotation']->id);
?>
<div id="com<?php echo $vars['annotation']->id; ?>" class="generic_comment"><!-- start of generic_comment div -->

    <div class="generic_comment_icon">
<?php
echo elgg_view("profile/icon",
        array(
            'entity' => $owner,
            'size' => 'small'
        )
);
?>
    </div>

    <div class="generic_comment_details">

        <!-- output the actual comment -->
<?php echo elgg_view("output/longtext", array("value" => $vars['annotation']->value)); ?>

        <p class="generic_comment_owner">
            <a href="<?php echo $owner->getURL(); ?>"><?php echo $owner->name; ?></a> <?php echo elgg_view_friendly_time($vars['annotation']->time_created); ?>
            - <?php
echo "" . elgg_view("output/buttonlink", array(
    'href' => "#",
    'text' => elgg_echo('like'),
    'id' => "likebutton" . $vars['annotation']->id,
    'class' => "likebutton hide",
)) . "";
?>

<?php
echo "" . elgg_view("output/buttonlink", array(
    'href' => "#",
    'text' => elgg_echo('unlike'),
    'id' => "unlikebutton" . $vars['annotation']->id,
    'class' => "unlikebutton hide",
)) . "";
?>
        </p>

<?php
// if the user looking at the comment can edit, show the delete link
if ($vars['annotation']->canEdit()) {
?>
        <p>
<?php
    echo elgg_view("output/confirmlink", array(
        'href' => $vars['url'] . "action/comments/delete?annotation_id=" . $vars['annotation']->id,
        'text' => elgg_echo('delete'),
        'confirm' => elgg_echo('deleteconfirm'),
    ));
?>
        </p>

<?php
} //end of can edit if statement
?>

        <div id="like<?php echo $vars['annotation']->id ?>" class="like_display hide">
            <i></i>
            <div><img src="<?php echo $vars['url']; ?>mod/like_comment/graphics/like.png" />
                <span><?php echo $listeusername . " like this"; ?></span>
            </div>
        </div>
        
    </div><!-- end of generic_comment_details -->
</div><!-- end of generic_comment div -->

<script>
    $.getJSON("<?php echo $CONFIG->wwwroot . "/mod/like_comment/ajax/get_usernamelist.php?annotation_guid=" . $vars['annotation']->id; ?>", function(data){
        initDisplayLike(<?php echo $vars['annotation']->id ?>, data);
    });
</script>


<?php } else { */


/**
 * Elgg generic comment view
 *
 * @uses $vars['annotation']  ElggAnnotation object
 * @uses $vars['full_view']   Display fill view or brief view
 */
    

    
if (!isset($vars['annotation'])) {
	return true;
}

$full_view = elgg_extract('full_view', $vars, true);

$comment = $vars['annotation'];

$entity = get_entity($comment->entity_guid);
$commenter = get_user($comment->owner_guid);
if (!$entity || !$commenter) {
	return true;
}

$friendlytime = elgg_view_friendly_time($comment->time_created);

$commenter_icon = elgg_view_entity_icon($commenter, 'tiny');
$commenter_link = "<a href=\"{$commenter->getURL()}\">$commenter->name</a>";

$entity_title = $entity->title ? $entity->title : elgg_echo('untitled');
$entity_link = "<a href=\"{$entity->getURL()}\">$entity_title</a>";

if ($full_view) {
	$menu = elgg_view_menu('annotation', array(
		'annotation' => $comment,
		'sort_by' => 'priority',
		'class' => 'elgg-menu-hz float-alt',
	));

	$comment_text = elgg_view("output/longtext", array("value" => $comment->value));

	$body = <<<HTML
<div class="mbn">
	$menu
	$commenter_link
	<span class="elgg-subtext">
		$friendlytime
	</span>
	$comment_text
</div>
HTML;

	echo elgg_view_image_block($commenter_icon, $body);
	

	echo "" . elgg_view("output/buttonlink", array(
	        'href' => "#",
	       // 'text' => elgg_echo('like'),
	        'text' => '<span class="elgg-icon elgg-icon-thumbs-up "></span>',
	        'id' => "likebutton" . $vars['annotation']->id,
	        'class' => "likebutton hide",
	)) . "";
	
	echo "" . elgg_view("output/buttonlink", array(
	        'href' => "#",
	        //'text' => elgg_echo('unlike'),
	        'text' => '<span class="elgg-icon elgg-icon-thumbs-up-alt "></span>',
	        
	        'id' => "unlikebutton" . $vars['annotation']->id,
	        'class' => "unlikebutton hide",
	)) . "";
	
?>
	<div id="like<?php echo $vars['annotation']->id ?>" class="like_display hide">
	<i></i>
	<div>
	<span><?php echo $listeusername . " like this"; ?></span>
	            </div>
	        </div>
<?php	
} else {
	// brief view

	//@todo need link to actual comment!

	$commented_on = elgg_echo('generic_comment:on', array($commenter_link, $entity_link));

	$excerpt = elgg_get_excerpt($comment->value, 80);

	$body = <<<HTML
<span class="elgg-subtext">
	$commented_on ($friendlytime): $excerpt
</span>
HTML;

	echo elgg_view_image_block($commenter_icon, $body);

}
    
/*
}*/?>

<script>
    $.getJSON("<?php echo $CONFIG->wwwroot . "/mod/like_comment/ajax/get_usernamelist.php?annotation_guid=" . $vars['annotation']->id; ?>", function(data){
        initDisplayLike(<?php echo $vars['annotation']->id ?>, data);
    });
</script>