<?php

if (elgg_is_active_plugin ( 'like_comment' )) {
    /**
     * Like_comment plugin language pack
     *
     * @package Like_Comment Plugin
     * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
     * @author Evobilis <info@evobilis.com>
     * @link http://evobilis.com/
     */   
    
    if (! isset ( $vars ['annotation'] )) {
        return true;
    }
    
    $full_view = elgg_extract ( 'full_view', $vars, true );
    
    

    
    $comment = $vars ['annotation'];
    
    $entity = get_entity ( $comment->entity_guid );
    $commenter = get_user ( $comment->owner_guid );
    if (! $entity || ! $commenter) {
        return true;
    }
    
    $friendlytime = elgg_view_friendly_time ( $comment->time_created );
    
    $commenter_icon = elgg_view_entity_icon ( $commenter, 'tiny' );
    $commenter_link = "<a href=\"{$commenter->getURL()}\">$commenter->name</a>";
    
    
    
    $image = "";
    if (elgg_is_active_plugin('profile') && ($user->permission == 'allowed' || elgg_is_admin_logged_in())) {
        $image .= '<a href="'.elgg_get_site_url().'profile/'.$commenter->username.'">';
    }
    
    $image .= '<img alt="mask" src="'.$commenter->getIconURL('small').'">';
    
    if (elgg_is_active_plugin('profile') && ($user->permission == 'allowed' || elgg_is_admin_logged_in())) {
        $image .= '</a>';
    }
    
    
    
    
    $entity_title = $entity->title ? $entity->title : elgg_echo ( 'untitled' );
    $entity_link = "<a href=\"{$entity->getURL()}\">$entity_title</a>";
    
    
    
    if ($full_view) {
    
        $menu = elgg_view_menu ( 'annotation', array (
                'annotation' => $comment,
                'sort_by' => 'priority',
                'class' => 'elgg-menu-hz float-alt'
        ) );
    
        $comment_text = elgg_view ( "output/longtext", array (
                "value" => $comment->value
        ) );
    
    
        
        $vars = array(
                'image' => $image,
                'entity' => $comment,
                'menu' =>$menu,
                'commenter_link' => $commenter_link,
                'commenter_name' => $commenter->name,
                'friendlytime'=>$friendlytime,
                'comment_text'=>$comment_text,
                'listeusername'=>$listeusername
    
        );
    
    
    
        echo elgg_view('page/components/image_block_comment', $vars);
    
    
    
    
    
    } else {
        // brief view
    
    
        $commented_on = elgg_echo ( 'generic_comment:on', array (
                $commenter_link,
                $entity_link
        ) );
    
        $excerpt = elgg_get_excerpt ( $comment->value, 80 );
    
    
    
        $vars = array(
                'image' => $image,
                'entity' => $comment,
                'menu' =>$menu,
                'commenter_link' => $commenter_link,
                'friendlytime'=>$friendlytime,
                'comment_text'=>$comment_text
    
        );
    
    
    
        echo elgg_view('page/components/image_block_comment', $vars);
         
    }
    
    $vars ['annotation'] = $comment;

?>


<script>
    $.getJSON("<?php echo $CONFIG->wwwroot . "/mod/like_comment/ajax/get_usernamelist.php?annotation_guid=" . $vars['annotation']->id; ?>", function(data){
        initDisplayLike(<?php echo $vars['annotation']->id ?>, data);
    });
</script>

<?php

} else {
    /**
     * Elgg generic comment view
     *
     * @uses $vars['annotation'] ElggAnnotation object
     * @uses $vars['full_view'] Display fill view or brief view
     */
    
    if (! isset ( $vars ['annotation'] )) {
        return true;
    }
    
    $full_view = elgg_extract ( 'full_view', $vars, true );
    
    $comment = $vars ['annotation'];
    
    $entity = get_entity ( $comment->entity_guid );
    $commenter = get_user ( $comment->owner_guid );
    if (! $entity || ! $commenter) {
        return true;
    }
    
    $friendlytime = elgg_view_friendly_time ( $comment->time_created );
    
    $commenter_icon = elgg_view_entity_icon ( $commenter, 'tiny' );
    $commenter_link = "<a href=\"{$commenter->getURL()}\">$commenter->name</a>";
    
    
    
    $image = "";
    if (elgg_is_active_plugin('profile') && ($user->permission == 'allowed' || elgg_is_admin_logged_in())) {
        $image .= '<a href="'.elgg_get_site_url().'profile/'.$commenter->username.'">';
    }
    
    $image .= '<img alt="mask" src="'.$commenter->getIconURL('small').'">';
    
    if (elgg_is_active_plugin('profile') && ($user->permission == 'allowed' || elgg_is_admin_logged_in())) {
        $image .= '</a>';
    }
    
    
    
    
    $entity_title = $entity->title ? $entity->title : elgg_echo ( 'untitled' );
    $entity_link = "<a href=\"{$entity->getURL()}\">$entity_title</a>";
    
    
    
    if ($full_view) {

        $menu = elgg_view_menu ( 'annotation', array (
                'annotation' => $comment,
                'sort_by' => 'priority',
                'class' => 'elgg-menu-hz float-alt' 
        ) );
        
        $comment_text = elgg_view ( "output/longtext", array (
                "value" => $comment->value 
        ) );
        
        
        
        $vars = array(
                'image' => $image,
                'entity' => $comment,
                'menu' =>$menu,
                'commenter_link' => $commenter_link,
                'commenter_name' => $commenter->name,
                'friendlytime'=>$friendlytime,
                'comment_text'=>$comment_text

        );
        
        
        
        echo elgg_view('page/components/image_block_comment', $vars);
        
        
        
        
        
    } else {
        // brief view
        
        
        $commented_on = elgg_echo ( 'generic_comment:on', array (
                $commenter_link,
                $entity_link 
        ) );
        
        $excerpt = elgg_get_excerpt ( $comment->value, 80 );
        
        
        
        $vars = array(
                'image' => $image,
                'entity' => $comment,
                'menu' =>$menu,
                'commenter_link' => $commenter_link,
                'friendlytime'=>$friendlytime,
                'comment_text'=>$comment_text

        );
        
        
        
        echo elgg_view('page/components/image_block_comment', $vars);
     
    }
    
    
}
?>