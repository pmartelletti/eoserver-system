<?php
function _custom_producto_get_term_from_arg($arg = 1, $vocabulary = 'categor_a') {
	$arg = pathauto_cleanstring ( arg ( $arg ) );
	$arg = str_replace ( '-', ' ', $arg );
	$term = taxonomy_get_term_by_name ( $arg, $vocabulary );
	$term = array_shift ( $term );
	
	if (! $term) {
		$node = menu_get_object ();
		if ($node && $node->type == 'productos') {
			$term = taxonomy_term_load ( $node->field_categor_a [LANGUAGE_NONE] [0] ['tid'] );
		}
	}
	
	return $term;
}
function _custom_producto_get_items_filtro_linea($categoria_term_name, $type = 'linea') {
	return _custom_producto_get_categorias_by_another_category ( $categoria_term_name, $type );
}
function _custom_producto_get_categorias_fijas() {
	$categorias_fijas = array (
			'Lineas',
			'Ambientes',
			'Colores',
			'Usos',
			'Medidas' 
	);
	return $categorias_fijas;
}

/**
 *
 * @param type $term_name
 *        	Taxonomy Name (Vocabulary Categoria) para armar las urls
 * @return array
 */
function _custom_producto_get_items_filtro_all($term_name) {
	$categorias_fijas = _custom_producto_get_categorias_fijas ();
	$items = array ();
	$term_name = pathauto_cleanstring ( $term_name );
	
	$items ['lineas'] = l ( 'Lineas', "productos/$term_name/lineas" );
	$items ['medidas'] = l ( 'Medidas', "productos/$term_name/medidas" );
	$items ['colores'] = l ( 'Tonos', "productos/$term_name/tonos" );
	$items ['usos'] = l ( 'Usos', "productos/$term_name/usos" );
	$items ['ambientes'] = l ( 'Ambientes', "productos/$term_name/ambientes" );
	
	return $items;
}
function _custom_producto_format_items_filtro_all($items, $arg, $type, $explode = false) {
	$list = array ();
	if ($type == 'tonos') {
		foreach ( $items as $item ) {
			if (isset ( $item->field_icono [LANGUAGE_NONE] )) {
				$name = theme ( 'image_style', array (
						'style_name' => '125x125',
						'path' => $item->field_icono [LANGUAGE_NONE] [0] ['uri'] 
				) );
				$url = str_replace ( array (
						' ' 
				), array (
						'-' 
				), $item->name );
				$list [] = l ( $name, "productos/$arg/$type/$url", array (
						'html' => true 
				) );
			}
		}
	} else {
		foreach ( $items as $item ) {
			$name = $item->name;
			if ($explode) {
				$name = explode ( ':', $item->name );
				$name = isset ( $name [1] ) ? $name [1] : $item->name;
			}
			
			$url = str_replace ( array (
					' ' 
			), array (
					'-' 
			), $item->name );
			$list [] = l ( $name, "productos/$arg/$type/$url" );
		}
	}
	return $list;
}

/**
 *
 * @param type $term_name
 *        	Taxonomy Name (Vocabulary Categoria) para armar las urls
 * @return array
 */
function _custom_producto_get_items_filtro_all_mobile($term_name) {
	$categorias_fijas = _custom_producto_get_categorias_fijas ();
	$items = array ();
	$term_name = pathauto_cleanstring ( $term_name );
	
	$items ['lineas'] ['data'] = l ( 'Lineas', "productos/$term_name/lineas" );
	$_items = _custom_producto_get_items_filtro_linea ( $term_name, 'lineas' );
	$items ['lineas'] ['children'] = _custom_producto_format_items_filtro_all ( $_items, $term_name, 'lineas' );
	
	$items ['medidas'] ['data'] = l ( 'Medidas', "productos/$term_name/medidas" );
	$_items = _custom_producto_get_items_filtro_linea ( $term_name, 'medidas' );
	$items ['medidas'] ['children'] = _custom_producto_format_items_filtro_all ( $_items, $term_name, 'medidas' );
	
	$items ['colores'] ['data'] = l ( 'Tonos', "productos/$term_name/tonos" );
	$_items = _custom_producto_get_items_filtro_linea ( $term_name, 'colores' );
	$items ['colores'] ['children'] = _custom_producto_format_items_filtro_all ( $_items, $term_name, 'tonos' );
	
	$items ['usos'] ['data'] = l ( 'Usos', "productos/$term_name/usos" );
	$_items = _custom_producto_get_items_filtro_linea ( $term_name, 'usos' );
	$items ['usos'] ['children'] = _custom_producto_format_items_filtro_all ( $_items, $term_name, 'usos' );
	
	$items ['ambientes'] ['data'] = l ( 'Ambientes', "productos/$term_name/ambientes" );
	$_items = _custom_producto_get_items_filtro_linea ( $term_name, 'ambientes' );
	$items ['ambientes'] ['children'] = _custom_producto_format_items_filtro_all ( $_items, $term_name, 'ambientes' );
	
	return $items;
}

/**
 * Devuelve las taxonomies filtradas por otra taxonomia
 * 
 * @param type $term_name
 *        	De la categoria a filtrar
 * @param type $output_result
 *        	Es el tipo de resutado a devolver. Los valores validos son: Linea, Ambiente, Uso, Medida, Color
 * @param type $vocabulary
 *        	Machine name del vocabuario del term_name
 * @return type
 */
function _custom_producto_get_categorias_by_another_category($term_name, $output_result, $vocabulary = 'categor_a') {
	static $terms;
	if (! isset ( $terms [$term_name] [$vocabulary] [$output_result] )) {
		$term = _custom_producto_get_term_from_arg ();
		/*
		 * SELECT taxonomy_term_data.*, taxonomy_index.*, field_revision_field_categor_a.*
		 * FROM taxonomy_term_data
		 *
		 * INNER JOIN taxonomy_index ON taxonomy_index.tid = taxonomy_term_data.tid
		 * INNER JOIN field_revision_field_categor_a ON field_revision_field_categor_a.entity_id = taxonomy_index.nid
		 *
		 * WHERE taxonomy_term_data.vid = 9 AND field_revision_field_categor_a.field_categor_a_tid = 172
		 * GROUP BY taxonomy_term_data.tid;
		 */
		$query = db_select ( 'taxonomy_term_data' )->fields ( 'taxonomy_term_data', array () )->condition ( 'field_revision_field_categor_a.field_categor_a_tid', $term->tid )->groupBy ( 'taxonomy_term_data.tid' );
		$query->join ( 'taxonomy_index', 'taxonomy_index', 'taxonomy_index.tid = taxonomy_term_data.tid' );
		$query->join ( 'field_revision_field_categor_a', 'field_revision_field_categor_a', 'field_revision_field_categor_a.entity_id = taxonomy_index.nid' );
		$filter_propiedades_adicionales = false;
		switch (strtolower ( $output_result )) {
			case 'linea' :
			case 'lineas' :
				$output_result = 'linea';
				$o_vocabulary = taxonomy_vocabulary_machine_name_load ( $output_result );
				break;
			case 'color' :
			case 'colores' :
				$output_result = 'color';
				$o_vocabulary = taxonomy_vocabulary_machine_name_load ( $output_result );
				break;
			case 'tonos' :
				$output_result = 'tono';
				$o_vocabulary = taxonomy_vocabulary_machine_name_load ( $output_result );
				break;
			case 'ambiente' :
			case 'ambientes' :
				$output_result = 'ambiente';
				$filter_propiedades_adicionales = true;
				break;
			case 'uso' :
			case 'usos' :
				$output_result = 'uso';
				$filter_propiedades_adicionales = true;
				break;
			case 'medida' :
			case 'medidas' :
				$output_result = 'medida';
				$filter_propiedades_adicionales = true;
				break;
		}
		if ($filter_propiedades_adicionales) {
			$query->join ( 'taxonomy_term_hierarchy', 'taxonomy_term_hierarchy', 'taxonomy_term_hierarchy.tid = taxonomy_term_data.tid', NULL );
			$_term_parent = taxonomy_get_term_by_name ( $output_result, 'propiedades_adicionales' );
			$tid = key ( $_term_parent );
			$o_vocabulary = taxonomy_vocabulary_machine_name_load ( 'propiedades_adicionales' );
			$query->condition ( 'taxonomy_term_hierarchy.parent', $tid );
		}
		if ($o_vocabulary) {
			$query->condition ( 'taxonomy_term_data.vid', $o_vocabulary->vid );
		}
		$result = $query->execute ()->fetchAll ();
		$terms [$term_name] [$vocabulary] [$output_result] = array ();
		
		foreach ( $result as $t ) {
			$terms [$term_name] [$vocabulary] [$output_result] [$t->tid] = taxonomy_term_load ( $t->tid );
		}
		usort ( $terms [$term_name] [$vocabulary] [$output_result], "_custom_producto_sort_filter_categoria" );
	}
	return $terms [$term_name] [$vocabulary] [$output_result];
}
function _custom_producto_sort_filter_categoria($a, $b) {
	return strcmp ( $a->name, $b->name );
}
