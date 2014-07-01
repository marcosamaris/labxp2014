<?php
/**
 * Categories input view
 *
 * @package ElggCategories
 *
 * @uses $vars['entity'] The entity being edited or created
 */
$spaces = elgg_get_site_entity ()->filters_spaces;
if (empty ( $spaces )) {
    $spaces = array ();
}

if (! empty ( $spaces )) {
    if (! is_array ( $spaces )) {
        $spaces = array (
                $spaces 
        );
    }
    
    $spaces = array_flip ( $spaces );
    
   
    
    array_walk ( $spaces, create_function ( '&$v, $k', '$v = $k;' ) );
    
    $allspaces = array("" => elgg_echo("filters:allspaces"));
    $spaces = array_merge($allspaces, $spaces);
    
    
    ?>

<div class="form-group">
    <div class="row">
        <div class="col-lg-8 col-md-6">
	       <label for="spaces"><?php echo elgg_echo('filters:spaces'); ?></label>
	    </div>
	</div>
	<div class="row">
	   <div class="col-lg-3 col-md-3">
        	<?php
            
            echo elgg_view ( 'input/dropdown', array (
                    'value' => '',
                    'name' => 'spaces',
                    'class'=>'form-control',
                    'options_values' => $spaces 
            ) );
            
            ?>
        </div>
     </div>
</div>
<?php
}
?>