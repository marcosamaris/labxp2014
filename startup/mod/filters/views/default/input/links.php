<?php
/**
 * Elgg checkbox input
 * Displays a checkbox input field
 *
 * @note This also includes a hidden input with the same name as the checkboxes
 * to make sure something is sent to the server.  The default value is 0.
 * If using JS, be specific to avoid selecting the hidden default value:
 * 	$('input[type=checkbox][name=name]')
 * 
 * @warning Passing integers as labels does not currently work due to a
 * deprecated hack that will be removed in Elgg 1.9. To use integer labels,
 * the labels must be character codes: 1 would be &#0049;
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses string $vars['name']     The name of the input fields
 *                                (Forced to an array by appending [])

 * @uses string $vars['default']  The default value to send if nothing is checked.
 *                                Optional, defaults to 0. Set to FALSE for no default.
 * @uses bool   $vars['disabled'] Make all input elements disabled. Optional.
 * @uses string $vars['value']    The current value. Single value or array. Optional.
 * @uses string $vars['class']    Additional class of the list. Optional.
 *
 */













if (count($vars['options']) > 0) {
	

	$content = "<ul>";

	foreach ($vars['options'] as $label => $value) {
	
		
		$url = $vars['url'];
		$name =  $vars['name'];
		$class_active =  $vars['class'];
		
		
		$info = array();
		$info['class'] = "";
		$info['url'] = "";
		
		if(strpos($url, "home") == false){
			$url .= "";
		}else if(strpos($url, "?") != false ){
			$url .= "";
		}else{
			$url .= "/";
		}
		
		
		if(strpos($url, "?") == false)	{
			$url .= "?";
		}else{
			$url .= "";
		}
		
		
		
		$get_var = $name."=".$value;
		
		
		if(strpos($url, $value) == false){ //não existe
		
			//se não existir,
			//não marca como bold
			//add no link
		
		
			$info['class'] = "";
			$info['url'] = $url;
		
			if(substr($url, -1) != "?")
				$info['url'] .= "&";
		
			$info['url'] .= $get_var;
		
		}else{
		
			// se existir, marca como bold
			//remove do link ou não adiciona no link
		
			$info['class'] = $class_active;
		
		
			$info['url'] = strstr($url, "?", true); //antes do ?
		
			$temp =  strstr($url, "?"); //depois do ?
			$urlParameters = str_replace($get_var, "", $temp);
			$urlParameters = rtrim($urlParameters, "&");
			$urlParameters = str_replace("?&", "?", $urlParameters);
		
		
			if(!empty($urlParameters))
				$info['url'] .= $urlParameters;
				
		}
		
		
		//$arrayInfoLink = prepareLinkForFilter($vars['url'], $vars['name'], $value, $vars['class']);
		
		
		$content .= "<li><a href=\"{$info['url']}\" class=\"{$info['class']}\">";

		
		
		$content .= $label;
		$content .= "</a></li>";
		
	}
	$content .=  '</ul>';
	
	echo $content;
}


