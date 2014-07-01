<?php



if (count ( $vars ['options'] ) > 0) {

    $content = "<ul>";

    foreach ( $vars ['options'] as $label => $value ) {


        
       $info =  generateUrlFilters($vars ['url'], $vars ['name'], $value, $vars ['class']);

       
        $content .= "<li><a href=\"{$info['url']}\" class=\"{$info['class']}\">";

        $content .= $label;
        $content .= "</a></li>";
    }
    $content .= '</ul>';

    echo $content;

}


