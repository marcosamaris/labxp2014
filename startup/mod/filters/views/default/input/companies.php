<?php

$companies = elgg_get_site_entity()->filters_companies;
$selectedCompany = get_input("companies");
if (empty ( $companies )) {
    $companies = array ();
}

if (! empty ( $companies )) {
    if (! is_array ( $companies )) {
        $companies = array (
                $companies 
        );
    }
    
    $companies = array_flip ( $companies );
    array_walk ( $companies, create_function ( '&$v, $k', '$v = $k;' ) );
    
    $allcompanies = array("" => elgg_echo("filters:allcompanies"));
    $companies = array_merge($allcompanies, $companies);
    

            echo elgg_view ( 'input/dropdown', array (
                    'value' => $selectedCompany,
                    'name' => 'companies',
                    'id' => 'companies',
                    'class'=>$vars['class'],
                    'options_values' => $companies 
            ) );
}

?>
