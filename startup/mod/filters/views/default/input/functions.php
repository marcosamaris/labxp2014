<?php
/**
 * Categories input view
 *
 * @package ElggCategories
 *
 * @uses $vars['entity'] The entity being edited or created
 */
$functions = elgg_get_site_entity ()->filters_functions;
if (empty ( $functions )) {
    $functions = array ();
}

if (! empty ( $functions )) {
    if (! is_array ( $functions )) {
        $functions = array (
                $functions 
        );
    }
    
    $functions = array_flip ( $functions );
    array_walk ( $functions, create_function ( '&$v, $k', '$v = $k;' ) );
    
    
    $allfunctions = array("" => elgg_echo("filters:allfunctions"));
    $functionsAll = array_merge($allfunctions, $functions);
    
    $nonefunctions = array("" => elgg_echo("filters:none"));
    $functionsNone = array_merge($nonefunctions, $functions);
    
    ?>
<div class="form-group">
    <div class="row">
        <div class="col-lg-8 col-md-6">
	       <label for="functions"><?php echo elgg_echo('filters:functions'); ?></label>
	     </div>
	</div>
	<div class="row">
	<div class="col-lg-3 col-md-3">
        <?php
            echo elgg_view ( 'input/dropdown', array (
                    'value' => '',
                    'name' => 'functions',
                    'id' => 'functions',
                    'class'=>'form-control',
                    'options_values' => $functionsAll 
            ) );
         ?>
     </div>
     <div class="col-lg-3 col-md-3">
        <?php   
            echo elgg_view ( 'input/dropdown', array (
                    'value' => '',
                    'name' => 'functions1',
                    'class'=>'form-control',
                    'options_values' => $functionsNone 
            ) );
         ?>
    </div>
    </div>
</div>


<?php
}

?>