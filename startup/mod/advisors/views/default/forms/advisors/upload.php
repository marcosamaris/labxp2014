<!-- <form action="save_upload"  method="post"
	enctype="multipart/form-data">
	<label for="file">Filename:</label>
	<input type="file" name="file" id="file"><br>
	
	<input type="submit" name="submit" value="Submit">
</form>
 -->

<label for="image_upload">Image upload</label>
<?php echo elgg_view('input/file', array('name' => 'img_upload')); ?>
<input type="submit" name="submit" value="Submit">