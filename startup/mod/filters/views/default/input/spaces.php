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
    
    ?>

<td><label><?php echo elgg_echo('filters:spaces'); ?></label><br />
	<?php
    
    echo elgg_view ( 'input/dropdown', array (
            'value' => '',
            'name' => 'spaces',
            'options_values' => $spaces 
    ) );
    
    ?>
	</td>
</tr>
</table>
<?php
}
?>