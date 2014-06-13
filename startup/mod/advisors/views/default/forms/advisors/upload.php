<?php 


?>

<label for="image_upload">Image upload</label>
<?php echo elgg_view('input/file', array('name' => 'img_upload')); ?>
<?php echo elgg_view('input/hidden', array('name' => 'advisor_guid', 'value'=> $_REQUEST['guid'])); ?>
<input type="submit" name="submit" value="Submit">