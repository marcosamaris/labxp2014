<?php
/**
 * Elgg image block pattern
 *
 * Common pattern where there is an image, icon, media object to the left
 * and a descriptive block of text to the right.
 * 
 * ---------------------------------------------------------------
 * |          |                                      |    alt    |
 * |  image   |               body                   |   image   |
 * |  block   |               block                  |   block   |
 * |          |                                      | (optional)|
 * ---------------------------------------------------------------
 *
 * @uses $vars['body']        HTML content of the body block
 * @uses $vars['image']       HTML content of the image block
 * @uses $vars['image_alt']   HTML content of the alternate image block
 * @uses $vars['class']       Optional additional class for media element
 * @uses $vars['id']          Optional id for the media element
 */


$image = elgg_extract('image', $vars, '');
$home = $vars['entity'];
$metadata = $vars['metadata'];
$responses = $vars['responses'];
$comment_count = $vars['comment_count'];

$owner = $home->getOwnerEntity();
$ownername = $owner->name;

$date = elgg_view_friendly_time($home->time_created);

$content = $vars['content'];

$functions = elgg_view('output/functions_list', $vars);
$spaces = elgg_view('output/spaces_list', $vars);
 
$id = '';
if (isset($vars['id'])) {
	$id = "id=\"{$vars['id']}\"";
}







echo <<<HTML
<div class="detail2 clearfix" $id>
    <div class="col-lg-10 col-xs-12 description">
        <div class="avatar avatar2 avatar-width" >
            $image
            <p class="name">$ownername</p>
            <p class="date">$date</p>
        </div>    
        <div class="avatar-detail-2">                        	
            <p>$content</p>
        </div>
    </div>
    <div class="col-sm-2 col-xs-12 detail-bt col-lg-2">
        <!--<button class="grey-bt">Unfollow <span>Q</span></button>-->                     
    </div>
    <div class="col-sm-12 col-xs-12">
                    	<div class="shared">
                        	<p class="border">Shared with:  Functions: <span>$functions</span> <span class="sep">|</span>Spaces:  <span>$spaces</span></p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xs-12 grey-bar">
                    	<div class="answer">
                        	 $metadata
                        </div>
                    </div>
HTML;
                    
if($comment_count > 0){

echo <<<HTML
<div class="col-sm-12 col-xs-12">
    	<div class="comment-text">
        	Comments: <span>$comment_count</span>
        </div>
    </div>
HTML;
}
echo <<<HTML
    
    
    $responses             

</div>
HTML;
