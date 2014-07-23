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
$comment = $vars['entity'];
$menu = $vars['menu'];
$commenter_name = $vars['commenter_name'];
$friendlytime = $vars['friendlytime'];
$comment_text = $vars['comment_text'];



/*$owner = $comment->getOwnerEntity();
 $ownername = $owner->name;

$date = elgg_view_friendly_time($home->time_created);

$content = $vars['content'];

$functions = elgg_view('output/functions_list', $vars);
$spaces = elgg_view('output/spaces_list', $vars);

$id = '';
if (isset($vars['id'])) {
$id = "id=\"{$vars['id']}\"";
}
*/




echo <<<HTML
<div class="col-lg-10 col-xs-12 description">
<div class="avatar avatar2 avatar-width">
$image
<p class="name">$commenter_name</p>
<p class="date">$friendlytime</p>
</div>
        
<div class="avatar-detail-2">
<p>$comment_text</p>
 <div class="answer">$menu</div>       
        
</div>
</div>
HTML;
        
         
         
if (elgg_is_active_plugin ( 'like_comment' )) {
    

/*echo "" . elgg_view ( "output/buttonlink", array (
                'href' => "#",
                'text' => '<span class="elgg-icon elgg-icon-thumbs-up "></span>',
                'id' => "likebutton" . $comment->id,
                'class' => "likebutton hide" 
        ) ) . "";
        
        echo "" . elgg_view ( "output/buttonlink", array (
                'href' => "#",
                'text' => '<span class="elgg-icon elgg-icon-thumbs-up-alt "></span>',
                
                'id' => "unlikebutton" . $comment->id,
                'class' => "unlikebutton hide" 
        ) ) . "";
 */
           
echo <<<HTML
<div class="col-lg-2 col-xs-12 text-center">

<a class="vote likebutton hide" id="likebutton{$comment->id}" href="#">UP<br>Vote<br><span id="likelistnumberusername{$comment->id}" data-toggle="tooltip" data-placement="left" title="" class="vote-tooltip"></span></a>
<a class="vote unlikebutton hide" id="unlikebutton{$comment->id}" href="#">UP<br>Voted<br><span id="unlikelistnumberusername{$comment->id}"  data-toggle="tooltip" data-placement="left" title="" class="vote-tooltip"></span></a>
                
</div>
HTML;


/*
<div id="like<?php echo $comment->id ?>" class="like_display hide">
<i></i>
<div>
<span><?php echo $listeusername . " like this"; ?></span>
</div>
</div>
*/
?>



<?php

}
?>