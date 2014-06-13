<?php

$site = elgg_get_site_entity();
$url = $site->getURL();




$guid = get_input("advisor_guid");
$advisor = get_entity($guid);

$dirAdvisorUploadFiles = elgg_get_plugins_path()."advisors/graphic/";



//$uploaddir = '/var/www/labxp2014/startup-data/advisors/';
//$uploadfile = 'http://localhost/labxp2014/startup-data/advisors/' . $_FILES['img_upload']['name'];


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



/*

if (empty($_FILES['img_upload']['name']))
{
	$error = elgg_echo('file:nofile');
	register_error($error);
	forward(REFERER);
}

//Make a file
$file = new FilePluginFile();
$file->subtype = "file";

// if no title, grab filename
if (empty($titolo))
$titolo = htmlspecialchars($_FILES['img_upload']['name'], ENT_QUOTES, 'UTF-8');

$file->title = $titolo;
$file->description = "description file";
$file->access_id = ACCESS_PUBLIC;
$file->owner_guid = elgg_get_logged_in_user_guid();

// we have a file upload, so process it
if (isset($_FILES['img_upload']['name']) && !empty($_FILES['img_upload']['name']))
{
	//Generate filename
	$prefix = "file/";
	$filestorename = elgg_strtolower(time().$_FILES['img_upload']['name']);
	$file->setFilename($prefix . $filestorename);
	//Set Mimetype
	$mime_type = ElggFile::detectMimeType($_FILES['img_upload']['tmp_name'], $_FILES['img_upload']['type']);
	$file->setMimeType($mime_type);
	//Set attributes
	$file->originalfilename = $_FILES['img_upload']['name'];
	$file->simpletype = file_get_simple_type($mime_type);
	// Open the file to guarantee the directory exists
	$file->open("write");
	$file->close();
	//Move file
	move_uploaded_file($_FILES['img_upload']['tmp_name'], $file->getFilenameOnFilestore());
	//Save file
	$guid = $file->save();

	//Make thumbnails
	if ($guid && $file->simpletype == "image")
	{
		$file->icontime = time();
		$thumbnail = get_resized_image_from_existing_file($file->getFilenameOnFilestore(), 60, 60, true);
		if ($thumbnail)
		{
			$thumb = new ElggFile();
			$thumb->setMimeType($_FILES['img_upload']['type']);

			$thumb->setFilename($prefix."thumb".$filestorename);
			$thumb->open("write");
			$thumb->write($thumbnail);
			$thumb->close();

			$file->thumbnail = $prefix."thumb".$filestorename;
			unset($thumbnail);
		}

		$thumbsmall = get_resized_image_from_existing_file($file->getFilenameOnFilestore(), 153, 153, true);
		if ($thumbsmall)
		{
			$thumb->setFilename($prefix."smallthumb".$filestorename);
			$thumb->open("write");
			$thumb->write($thumbsmall);
			$thumb->close();
			$file->smallthumb = $prefix."smallthumb".$filestorename;
			unset($thumbsmall);
		}

		$thumblarge = get_resized_image_from_existing_file($file->getFilenameOnFilestore(), 600, 600, false);
		if ($thumblarge)
		{
			$thumb->setFilename($prefix."largethumb".$filestorename);
			$thumb->open("write");
			$thumb->write($thumblarge);
			$thumb->close();
			$file->largethumb = $prefix."largethumb".$filestorename;
			unset($thumblarge);
		}
	}
	if ($guid)
	{
		$message = elgg_echo("gallery:status:upsuccess");
		system_message($message);
		forward($guid->getURL());
	}*/



?>


