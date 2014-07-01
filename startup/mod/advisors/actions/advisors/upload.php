<?php
//need to set the write permissions for directory graphic in advisors
$site = elgg_get_site_entity();
$url = $site->getURL();

$guid = get_input("advisor_guid");
$advisor = get_entity($guid);

$dirAdvisorUploadFiles = elgg_get_plugins_path()."advisors/graphic/";

$uploaddir = $dirAdvisorUploadFiles;
$uploadfile = "advisors/graphic/".$_FILES['img_upload']['name'];

if (!is_dir($uploaddir)){
	$newDir = mkdir($uploaddir);
}

$path =  elgg_get_site_url () . 'mod/advisors/graphic/'.$_FILES['img_upload']['name'];
 



if (move_uploaded_file($_FILES['img_upload']['tmp_name'], $uploaddir . $_FILES['img_upload']['name'])) {
	
	$advisor->advisorimage = $path;
	$advisor->setIcon($path);
	$advisor->save();
	system_message(elgg_echo("advisors:uploadsave:success"));
	
	
	
} else {
	
	$error = elgg_echo('file:nofile');
	register_error($error);
	forward(REFERER);
}


forward('admin/plugin_settings/advisors');

?>