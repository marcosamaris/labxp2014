<?php
/**
 * Edit home form
 *
 * @package home
 */
$categories_input = elgg_view ( 'input/functions', $vars );

?>

<div>    
    <?php echo elgg_view('input/longtext',array('name' => 'body', 'id' => 'textarea-home', 'placeholder' => 'What is your question?', 'rows'=> '3')); ?>
</div>

<?php echo $categories_input; ?>

<div>
    <?php echo elgg_view('input/submit', array('value' => elgg_echo('save'))); ?>
</div>
