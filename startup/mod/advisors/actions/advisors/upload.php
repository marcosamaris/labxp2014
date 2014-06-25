<?php

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
 


print "<pre>";
if (move_uploaded_file($_FILES['img_upload']['tmp_name'], $uploaddir . $_FILES['img_upload']['name'])) {
	
	$advisor->advisorimage = $path;
	$advisor->setIcon($path);
	$advisor->save();
	
	print "O arquivo é valido e foi carregado com sucesso. Aqui está alguma informação:\n";
	print_r($_FILES);
	system_message(elgg_echo("advisors:save:success"));
	
	
	
} else {
	print "Possivel ataque de upload! Aqui esta alguma informação:\n";
	print_r($_FILES);
	
	$error = elgg_echo('file:nofile');
	register_error($error);
	forward(REFERER);
}
print "</pre>";

forward('admin/plugin_settings/advisors');

?>