<?php
/**
 * Object summary
 *
 * Sample output
 * <ul class="elgg-menu elgg-menu-entity"><li>Public</li><li>Like this</li></ul>
 * <h3><a href="">Title</a></h3>
 * <p class="elgg-subtext">Posted 3 hours ago by George</p>
 * <p class="elgg-tags"><a href="">one</a>, <a href="">two</a></p>
 * <div class="elgg-content">Excerpt text</div>
 *
 * @uses $vars['entity']    ElggEntity
 * @uses $vars['title']     Title link (optional) false = no title, '' = default
 * @uses $vars['metadata']  HTML for entity menu and metadata (optional)
 * @uses $vars['subtitle']  HTML for the subtitle (optional)
 * @uses $vars['tags']      HTML for the tags (default is tags on entity, pass false for no tags)
 * @uses $vars['content']   HTML for the entity content (optional)
 */


$message_book = elgg_echo('advisors:bookhours');


echo <<<HTML

<div class="detail clearfix">
	<div class="col-lg-8 description">
		<div class="avatar">
			<img src="{$vars['avatar']}" alt="#" width="50" height="49">
		</div>
	<div class="avatar-detail">
		<h3>{$vars['title']}</h3>
		<p>{$vars['description']}</p>
	</div>
</div>
<div class="col-lg-4 detail-bt">
	<a href="#" class="book-hours-bt">
		$message_book
	</a>
	
	<div class="social-icon">

		<a href="maito:{$vars['email']}" class="mailto" data-toggle="tooltip" data-placement="top">mail</a>
		<a href="#" class="skype" data-toggle="tooltip" data-placement="top" title="" data-original-title="skype: {$vars['skype']}">skype</a>
		<a href="{$vars['linkedin']}" class="linkedin" data-toggle="tooltip" data-placement="top">linkedin</a>
		<a href="{$vars['googleplus']}" class="googleplus" data-toggle="tooltip" data-placement="top">googleplus</a>
		<a href="{$vars['twitter']}" class="twitter" data-toggle="tooltip" data-placement="top">twitter</a>
		<a href="{$vars['facebook']}" class="facebook" data-toggle="tooltip" data-placement="top">facebook</a>
	</div>
</div>

</div>
HTML;
