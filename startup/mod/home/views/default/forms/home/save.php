<?php
/**
 * Edit home form
 *
 * @package home
 */

//$home = get_entity($vars['guid']);
//$vars['entity'] = $home;

//$categories_input = elgg_view('input/functions', $vars);

// hidden inputs
//$container_guid_input = elgg_view('input/hidden', array('name' => 'container_guid', 'value' => elgg_get_page_owner_guid()));
//$guid_input = elgg_view('input/hidden', array('name' => 'guid', 'value' => $vars['guid']));

$categories_input = elgg_view('input/functions', $vars);



?>

<div>    
    <?php echo elgg_view('input/longtext',array('name' => 'body', 'id' => 'textarea-home', 'placeholder' => 'What is your question?', 'rows'=> '3')); ?>
</div>

<div>
	<label for="home_access_id"></label>

</div>

<?php echo $categories_input; ?> 

<div>
    <?php echo elgg_view('input/submit', array('value' => elgg_echo('save'))); ?>
</div>







