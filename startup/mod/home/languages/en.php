<?php
/**
 * Home english language file
 */

$english = array(
		
	'home' => 'Home',
	'home:home' => 'Home',
	'home:newsfeed' => 'News',
	'home:saved'=> 'Your post was saved',
	'home:nosaved'=> 'The post could not be saved',
	'home:registered'=> 'You were successfully registered',
	'home:noregistered' => 'Your register could not be done',	
	/**
	 * Home river
	 */	
	'river:create:object:home' => "%s posted %s",
	'river:comment:object:home' => '%s commented by %s',

		
		/*menssages*/
		
		'home:message:saved' => 'Home post saved.',
		'home:error:cannot_save' => 'Cannot save home post.',
		'home:error:cannot_write_to_container' => 'Insufficient access to save home to group.',
		'home:messages:warning:draft' => 'There is an unsaved draft of this post!',
		'home:edit_revision_notice' => '(Old version)',
		'home:message:deleted_post' => 'Home post deleted.',
		'home:error:cannot_delete_post' => 'Cannot delete home post.',
		'home:none' => 'No home posts',
		'home:error:missing:title' => 'Please enter a home title!',
		'home:error:missing:description' => 'Please enter the body of your home!',
		'home:error:cannot_edit_post' => 'This post may not exist or you may not have permissions to edit it.',
		'home:error:revision_not_found' => 'Cannot find this revision.',
		
);

add_translation('en', $english);