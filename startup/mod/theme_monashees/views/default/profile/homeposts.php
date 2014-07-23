
    <?php
    if (elgg_is_active_plugin ( 'home' )){ 

    $user = elgg_get_page_owner_entity();
        
    $options = array (
            'type' => 'object',
            'subtype' => 'home',
            'limit' => $pagination,
            //'owner_guid' => get_input ( "owner_guid", ELGG_ENTITIES_ANY_VALUE ),
            'owner_guid' => $user->getGUID(),
            'full_view' => FALSE,
            'metadata_case_sensitive' => FALSE,
            'metadata_name_value_pairs_operator' => 'AND',
            'metadata_name_value_pairs' => array (
                    $pairFunctions,
                    $pairSpaces 
            ),
            'view_path_list' => 'home/list' 
    );
    
    // LIST OF POSTS
    $list_post = elgg_list_entities_from_metadata ( $options );
    $container_posts = '<div class="container-posts">' . $list_post . '</div>';
    
    echo $container_posts;
    }
    ?>
