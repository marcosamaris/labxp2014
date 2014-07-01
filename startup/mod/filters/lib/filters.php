<?php
function generateUrlFilters($url, $name, $value, $class_active) {
    $info = array ();
    $info ['class'] = "";
    $info ['url'] = "";
    
    if (strpos ( $url, "home" ) == false) {
        $url .= "";
    } else if (strpos ( $url, "?" ) != false) {
        $url .= "";
    } else {
        $url .= "/";
    }
    
    if (strpos ( $url, "?" ) == false) {
        $url .= "?";
    } else {
        $url .= "";
    }
    
    $get_var = $name . "=" . $value;
    
    if (strpos ( $url, $value ) == false) {
        // não existe
        // se não existir,
        // não marca como bold
        // add no link
        
        $info ['class'] = "";
        $info ['url'] = $url;
        
        if (substr ( $url, - 1 ) != "?")
            $info ['url'] .= "&";
        
        $info ['url'] .= $get_var;
    } else {
        
        // se existir, marca como bold
        // remove do link ou não adiciona no link
        
        $info ['class'] = $class_active;
        
        $info ['url'] = strstr ( $url, "?", true ); // antes do ?
        
        $temp = strstr ( $url, "?" ); // depois do ?
        $urlParameters = str_replace ( $get_var, "", $temp );
        $urlParameters = rtrim ( $urlParameters, "&" );
        $urlParameters = str_replace ( "?&", "?", $urlParameters );
        
        if (! empty ( $urlParameters ))
            $info ['url'] .= $urlParameters;
    }
    return $info;
}
function generateUrlAllFunctions($url) {
    $info = array ();
    $info ['class'] = "";
    $info ['url'] = "";
    

    $info ['url'] = ereg_replace('(functions_list\[\]=[A-Za-z\/\-]+)', "", $url);
    
    return $info;
}
function generateUrlAllFilters($url, $variable) {
    
    $info = array ();
    $info ['class'] = "";
    $info ['url'] = "";

    
    $pattern = '/'.$variable.'\[\]=[A-Za-z\/\-]+/';
    preg_match_all($pattern, $url, $matches);
    
    
    if(count($matches[0]) == 0){
        $info['class'] = 'all_active';
    }else{
        $info['class'] = 'all_desactive';
    }
 
    
    
    
        
    
    
    
    
    
    

    $info ['url'] = ereg_replace('(spaces_list\[\]=[A-Za-z\/\-]+)', "", $url);

    
    return $info;
}