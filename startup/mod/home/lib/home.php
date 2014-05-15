<?php

function elgg_list_home_test() {
	$Hola = "Hola Mundinho";
	return $Hola;
}

function elgg_get_home_filter(array $options = array()) {
	$defaults = array(
		'metadata_names'                     => ELGG_ENTITIES_ANY_VALUE,
		'metadata_values'                    => ELGG_ENTITIES_ANY_VALUE,
		'metadata_name_value_pairs'          => ELGG_ENTITIES_ANY_VALUE,

		'metadata_name_value_pairs_operator' => 'AND',
		'metadata_case_sensitive'            => TRUE,
		'order_by_metadata'                  => array(),

		'metadata_owner_guids'               => ELGG_ENTITIES_ANY_VALUE,
	);

	$options = array_merge($defaults, $options);
	
	if (!$options = elgg_entities_get_metastrings_options('metadata', $options)) {
		return FALSE;
	}

	return elgg_get_home($options);
}

function elgg_list_home_filter($options) {
	return elgg_list_home($options, 'elgg_get_home_filter');
}


function elgg_list_home(array $options = array(), $getter = 'elgg_get_entities',
	$viewer = 'elgg_view_entity_list') {

	global $autofeed;
	$autofeed = true;

	$offset_key = isset($options['offset_key']) ? $options['offset_key'] : 'offset';

	$defaults = array(
		'offset' => (int) max(get_input($offset_key, 0), 0),
		'limit' => (int) max(get_input('limit', 10), 0),
		'full_view' => TRUE,
		'list_type_toggle' => FALSE,
		'pagination' => TRUE,
	);

	$options = array_merge($defaults, $options);

	//backwards compatibility
	if (isset($options['view_type_toggle'])) {
		$options['list_type_toggle'] = $options['view_type_toggle'];
	}

	$options['count'] = TRUE;
	$count = $getter($options);

	$options['count'] = FALSE;
	$entities = $getter($options);

	$options['count'] = $count;

	return $viewer($entities, $options);
}

function elgg_get_home(array $options = array()) {
	global $CONFIG;

	$defaults = array(
		'types'					=>	ELGG_ENTITIES_ANY_VALUE,
		'subtypes'				=>	ELGG_ENTITIES_ANY_VALUE,
		'type_subtype_pairs'	=>	ELGG_ENTITIES_ANY_VALUE,

		'guids'					=>	ELGG_ENTITIES_ANY_VALUE,
		'owner_guids'			=>	ELGG_ENTITIES_ANY_VALUE,
		'container_guids'		=>	ELGG_ENTITIES_ANY_VALUE,
		'site_guids'			=>	$CONFIG->site_guid,

		'modified_time_lower'	=>	ELGG_ENTITIES_ANY_VALUE,
		'modified_time_upper'	=>	ELGG_ENTITIES_ANY_VALUE,
		'created_time_lower'	=>	ELGG_ENTITIES_ANY_VALUE,
		'created_time_upper'	=>	ELGG_ENTITIES_ANY_VALUE,

		'reverse_order_by'		=>	false,
		'order_by' 				=>	'e.time_created desc',
		'group_by'				=>	ELGG_ENTITIES_ANY_VALUE,
		'limit'					=>	10,
		'offset'				=>	0,
		'count'					=>	FALSE,
		'selects'				=>	array(),
		'wheres'				=>	array(),
		'joins'					=>	array(),

		'callback'				=> 'entity_row_to_elggstar',

		'__ElggBatch'			=> null,
	);

	$options = array_merge($defaults, $options);

	// can't use helper function with type_subtype_pair because
	// it's already an array...just need to merge it
	if (isset($options['type_subtype_pair'])) {
		if (isset($options['type_subtype_pairs'])) {
			$options['type_subtype_pairs'] = array_merge($options['type_subtype_pairs'],
				$options['type_subtype_pair']);
		} else {
			$options['type_subtype_pairs'] = $options['type_subtype_pair'];
		}
	}

	$singulars = array('type', 'subtype', 'guid', 'owner_guid', 'container_guid', 'site_guid');
	$options = elgg_normalise_plural_options_array($options, $singulars);

	// evaluate where clauses
	if (!is_array($options['wheres'])) {
		$options['wheres'] = array($options['wheres']);
	}

	$wheres = $options['wheres'];

	$wheres[] = elgg_get_entity_type_subtype_where_sql('e', $options['types'],
		$options['subtypes'], $options['type_subtype_pairs']);

	$wheres[] = elgg_get_guid_based_where_sql('e.guid', $options['guids']);
	$wheres[] = elgg_get_guid_based_where_sql('e.owner_guid', $options['owner_guids']);
	$wheres[] = elgg_get_guid_based_where_sql('e.container_guid', $options['container_guids']);
	$wheres[] = elgg_get_guid_based_where_sql('e.site_guid', $options['site_guids']);

	$wheres[] = elgg_get_entity_time_where_sql('e', $options['created_time_upper'],
		$options['created_time_lower'], $options['modified_time_upper'], $options['modified_time_lower']);

	// see if any functions failed
	// remove empty strings on successful functions
	foreach ($wheres as $i => $where) {
		if ($where === FALSE) {
			return FALSE;
		} elseif (empty($where)) {
			unset($wheres[$i]);
		}
	}

	// remove identical where clauses
	$wheres = array_unique($wheres);

	// evaluate join clauses
	if (!is_array($options['joins'])) {
		$options['joins'] = array($options['joins']);
	}

	// remove identical join clauses
	$joins = array_unique($options['joins']);

	foreach ($joins as $i => $join) {
		if ($join === FALSE) {
			return FALSE;
		} elseif (empty($join)) {
			unset($joins[$i]);
		}
	}

	// evalutate selects
	if ($options['selects']) {
		$selects = '';
		foreach ($options['selects'] as $select) {
			$selects .= ", $select";
		}
	} else {
		$selects = '';
	}

	if (!$options['count']) {
		$query = "SELECT DISTINCT e.*{$selects} FROM {$CONFIG->dbprefix}entities e ";
	} else {
		$query = "SELECT count(DISTINCT e.guid) as total FROM {$CONFIG->dbprefix}entities e ";
	}

	// add joins
	foreach ($joins as $j) {
		$query .= " $j ";
	}

	// add wheres
	$query .= ' WHERE ';

	foreach ($wheres as $w) {
		$query .= " $w AND ";
	}

	// Add access controls
	$query .= get_access_sql_suffix('e');

	// reverse order by
	if ($options['reverse_order_by']) {
		$options['order_by'] = elgg_sql_reverse_order_by_clause($options['order_by']);
	}

	if (!$options['count']) {
		if ($options['group_by']) {
			$query .= " GROUP BY {$options['group_by']}";
		}

		if ($options['order_by']) {
			$query .= " ORDER BY {$options['order_by']}";
		}

		if ($options['limit']) {
			$limit = sanitise_int($options['limit'], false);
			$offset = sanitise_int($options['offset'], false);
			$query .= " LIMIT $offset, $limit";
		}

		if ($options['callback'] === 'entity_row_to_elggstar') {
			$dt = _elgg_fetch_entities_from_sql($query, $options['__ElggBatch']);
		} else {
			$dt = get_data($query, $options['callback']);
		}

		if ($dt) {
			// populate entity and metadata caches
			$guids = array();
			foreach ($dt as $item) {
				// A custom callback could result in items that aren't ElggEntity's, so check for them
				if ($item instanceof ElggEntity) {
					_elgg_cache_entity($item);
					// plugins usually have only settings
					if (!$item instanceof ElggPlugin) {
						$guids[] = $item->guid;
					}
				}
			}
			// @todo Without this, recursive delete fails. See #4568
			reset($dt);

			if ($guids) {
				elgg_get_metadata_cache()->populateFromEntities($guids);
			}
		}
		return $dt;
	} else {
		$total = get_data_row($query);
		return (int)$total->total;
	}
}