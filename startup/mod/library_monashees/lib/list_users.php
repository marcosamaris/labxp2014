<?php
/**
 * Returns a rendered list of annotations, plus pagination. This function
 * should be called by wrapper functions.
 *
 * @param array $annotations Array of annotations
 * @param array $vars        Display variables
 *		'count'      The total number of annotations across all pages
 *		'offset'     The current indexing offset
 *		'limit'      The number of annotations to display per page
 *		'full_view'  Display the full view of the annotation?
 *		'list_class' CSS Class applied to the list
 *		'offset_key' The url parameter key used for offset
 *
 * @return string The list of annotations
 * @access private
 */
function view_annotation_list($annotations, array $vars = array()) {
    $defaults = array(
            'items' => $annotations,
            'offset' => null,
            'limit' => null,
            'list_class' => 'elgg-list-annotation elgg-annotation-list', // @todo remove elgg-annotation-list in Elgg 1.9
            'full_view' => true,
            'offset_key' => 'annoff',
            'view' => 'page/components/list'
    );

    $vars = array_merge($defaults, $vars);

    if (!$vars["limit"] && !$vars["offset"]) {
        // no need for pagination if listing is unlimited
        $vars["pagination"] = false;
    }

    
    return elgg_view($vars['view'], $vars);
}

function view_adm_permission($entities, $vars = array(), $offset = 0, $limit = 10, $full_view = true,
		$listTypeToggle = true, $pagination = true) {

	if (!is_int($offset)) {
		$offset = (int)get_input('offset', 0);
	}

	// list type can be passed as request parameter
	$listType = get_input('list_type', 'list');
	if (get_input('listtype')) {
		elgg_deprecated_notice("'listtype' has been deprecated by 'list_type' for lists", 1.8);
		$listType = get_input('listtype');
	}

	if (is_array($vars)) {
		// new function
		$defaults = array(
				'items' => $entities,
				'list_class' => 'elgg-list-entity',
				'full_view' => true,
				'pagination' => true,
				'list_type' => $list_type,
				'list_type_toggle' => false,
				'offset' => $offset,
				'limit' => null,
		);

		$vars = array_merge($defaults, $vars);

	} else {
		// old function parameters
		elgg_deprecated_notice("Please update your use of elgg_view_entity_list()", 1.8);

		$vars = array(
				'items' => $entities,
				'count' => (int) $vars, // the old count parameter
				'offset' => $offset,
				'limit' => (int) $limit,
				'full_view' => $full_view,
				'pagination' => $pagination,
				'list_type' => $list_type,
				'list_type_toggle' => $listTypeToggle,
				'list_class' => 'elgg-list-entity',
		);
	}

	if (!$vars["limit"] && !$vars["offset"]) {
		// no need for pagination if listing is unlimited
		$vars["pagination"] = false;
	}
	

	if($vars['view_path_list']){
		return elgg_view($vars['view_path_list'], $vars);
	}	
	
	if ($vars['list_type'] != 'list') {
		return elgg_view('page/components/gallery', $vars);
	} 
	
	else {
		return elgg_view('page/components/list', $vars);
	}
}