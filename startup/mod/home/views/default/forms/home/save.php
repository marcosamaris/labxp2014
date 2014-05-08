
<?php
/**
 * Edit blog form
 *
 * @package Blog
 */

//$blog = get_entity($vars['guid']);
//$vars['entity'] = $blog;

//$categories_input = elgg_view('input/functions', $vars);

// hidden inputs
//$container_guid_input = elgg_view('input/hidden', array('name' => 'container_guid', 'value' => elgg_get_page_owner_guid()));
//$guid_input = elgg_view('input/hidden', array('name' => 'guid', 'value' => $vars['guid']));


?>

<div>
    <label><?php echo elgg_echo("body"); ?></label><br />
    <?php echo elgg_view('input/longtext',array('name' => 'body')); ?>
</div>

<?php echo $categories_input; ?> 

<div>
    <?php echo elgg_view('input/submit', array('value' => elgg_echo('save'))); ?>
</div>







