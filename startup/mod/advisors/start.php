<?php
function advisors_init() {	
	// add a site navigation item
	$item = new ElggMenuItem('advisors', elgg_echo('advisors:advisors'), 'advisors');
	elgg_register_menu_item('site', $item);
	elgg_register_entity_type('object', 'advisors');
	
	elgg_register_event_handler('update', 'all', 'advisors_save');
	elgg_register_event_handler('create', 'all', 'advisors_save');
	elgg_register_action ( "advisors/upload", elgg_get_plugins_path () . "advisors/actions/advisors/upload.php" );
	elgg_register_plugin_hook_handler('action', 'plugins/settings/save', 'advisor_save_admin');
	elgg_register_action ( 'advisors/delete', elgg_get_plugins_path () . "advisors/actions/advisors/delete.php" );
	
	elgg_register_page_handler ( 'advisors', 'advisors_page_handler' );
	elgg_register_plugin_hook_handler ( 'register', 'menu:entity', 'elgg_advisors_menu_setup' );
	
	elgg_register_library('elgg:file', elgg_get_plugins_path() . 'file/lib/file.php');
}

elgg_register_event_handler ( 'init', 'system', 'advisors_init' );


function elgg_advisors_menu_setup($hook, $type, $value, $params) {
	$handler = elgg_extract ( 'handler', $params, false );
	if ($handler != 'advisors') {
		return $value;
	}

	foreach ( $value as $index => $item ) {
		$name = $item->getName ();
		if ($name != 'delete' ) {
			unset ( $value [$index] );
		}
	}
	$entity = $params ['entity'];

	
	return $value;
}

function advisors_page_handler($page) {
	
	$page_type = $page[0];
	switch ($page_type) {
		case 'upload':			
			include elgg_get_plugins_path () . 'advisors/pages/advisors/imageform.php';
			break;
		case 'save_upload':
			include elgg_get_plugins_path () . 'advisors/pages/advisors/upload.php';
			
		default:		
			include elgg_get_plugins_path () . 'advisors/pages/advisors/index.php';
		break;
	}

	return true;
}



function advisors_save($event, $object_type, $object) {
	if ($object instanceof ElggEntity) {
		/*$marker = get_input('universal_category_marker');

		if ($marker == 'on') {*/
		$functions = get_input('functions');
		$functions1 = get_input('functions1');

		$spaces = get_input('spaces');
			
		$functions  = array(
				$functions, $functions1,
		);
			
		if (empty($functions)) {
			$functions  = array();
		}
		if (empty($spaces)) {
			$spaces = array();
		}

		$object->spaces = $spaces;
		$object->functions = $functions;
		//}
	}
	return TRUE;
}

function advisor_save_admin($hook, $type, $value, $params) {
	elgg_load_library('elgg:file');
	
	$plugin_id = get_input('plugin_id');
	if ($plugin_id != 'advisors') {
		return $value;
	}

	$advisor = new ElggObject();
	
	$advisor->subtype = "advisors";
	 	
	
	$advisor->owner_guid = elgg_get_logged_in_user_guid();
	
	$advisor->advisorname = get_input('advisorname');
	$advisor->advisordescr = get_input('advisordescr');
	$advisor->advisoremail = get_input('advisoremail');
	$advisor->advisorskype = get_input('advisorskype');
	$advisor->advisorlinkedin = get_input('advisorlinkedin');
	$advisor->advisorplus = get_input('advisorplus');
	$advisor->advisortwitter = get_input('advisortwitter');
	$advisor->advisorfb = get_input('advisorfb');
	$advisor->advisorimage = get_input('advisorimage');

	$advisor->save();
	
	if (empty($advisor->advisorimage))
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
		$titolo = htmlspecialchars($_FILES['advisorimage']['name'], ENT_QUOTES, 'UTF-8');
	
	$file->title = $titolo;
	$file->description = "description file";
	$file->access_id = ACCESS_PUBLIC;
	$file->owner_guid = elgg_get_logged_in_user_guid();
	
	// we have a file upload, so process it
	if (isset($_FILES['advisorimage']['name']) && !empty($_FILES['advisorimage']['name']))
	{
		//Generate filename
		$prefix = "file/";
		$filestorename = elgg_strtolower(time().$_FILES['advisorimage']['name']);
		$file->setFilename($prefix . $filestorename);
		//Set Mimetype
		$mime_type = ElggFile::detectMimeType($_FILES['advisorimage']['tmp_name'], $_FILES['advisorimage']['type']);
		$file->setMimeType($mime_type);
		//Set attributes
		$file->originalfilename = $_FILES['advisorimage']['name'];
		$file->simpletype = file_get_simple_type($mime_type);
		// Open the file to guarantee the directory exists
		$file->open("write");
		$file->close();
		//Move file
		move_uploaded_file($_FILES['advisorimage']['tmp_name'], $file->getFilenameOnFilestore());
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
				$thumb->setMimeType($_FILES['advisorimage']['type']);
	
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
		}
	}
	
	system_message(elgg_echo("advisors:save:success"));

	#elgg_delete_admin_notice('categories_admin_notice_no_categories');

	forward(REFERER);
}