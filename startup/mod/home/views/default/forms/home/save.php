<?php
/**
 * Edit home form
 *
 * @package home
 */


?>

<div class="form-group">
    <?php echo elgg_view('input/longtext',array('name' => 'body', 'id' => 'textarea-home', 'placeholder' => 'What is your question?', 'rows'=> '3', 'class'=>"form-control")); ?>
</div>


<?php echo elgg_view ( 'input/functions', $vars ); ?>
<?php echo elgg_view ( 'input/spaces', $vars ); ?>


<?php echo elgg_view('input/button', array('value' => elgg_echo('save'), 'class' => 'btn btn-primary', 'type'=>'submit')); ?>






