<?php
/**
 * Filters input view
 *
 * @package Filters
 *
 */
$user = elgg_get_logged_in_user_entity();


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


    echo elgg_view ( 'input/dropdown_register', array (
            
            'name' => 'functions',
            'default' => 'main function',
            'value' => $user->functions,
            'options_values' => $functions,
            'class' => 'selectpicker show-tick form-control' 
         ));

}

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


    echo elgg_view ( 'input/dropdown_register', array (
            
            'name' => 'spaces',
    		'default' => 'main space',
    		'value' => $user->spaces,
            'options_values' => $spaces,
    		'class' => 'selectpicker show-tick form-control'
    ));

}    


$companies = elgg_get_site_entity ()->filters_companies;
if (empty ( $companies )) {
    $companies = array ();
}

if (! empty ( $companies )) {
    if (! is_array ( $companies )) {
        $companies = array ($companies);
    }

    $companies = array_flip ( $companies );
    array_walk ( $companies, create_function ( '&$v, $k', '$v = $k;' ) );



    echo elgg_view ( 'input/dropdown_register', array (
            
            'name' => 'company',
    		'default' => 'company',
    		'value' => $user->company,
    		'options_values' => $companies,
    		'class' => 'selectpicker show-tick form-control'
    ) );
}
    
    
$roles = elgg_get_site_entity ()->filters_roles;
if (empty ( $roles )) {
    $roles = array ();
}

if (! empty ( $roles )) {
    if (! is_array ( $roles )) {
        $roles = array ($roles);
    }

    $roles = array_flip ( $roles );
    array_walk ( $roles, create_function ( '&$v, $k', '$v = $k;' ) );
    
    
    
    echo elgg_view ( 'input/dropdown_register', array (
            
            'name' => 'role',
    		'default' => 'main role',
    		'value' => $user->role,
    		'options_values' => $roles,
    		'class' => 'selectpicker show-tick form-control'
    ) );
}

?>

<div class="form-group">
<input name="company_email" type="text" class="form-control" placeholder="Your Company's Mail" value="<?php echo $user->company_email;?>"></input>
</div>

