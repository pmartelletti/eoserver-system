<?php

function _custom_producto_get_term_from_arg($arg = 1, $vocabulary = 'categor_a') {
    $arg = pathauto_cleanstring(arg($arg));
    $term = taxonomy_get_term_by_name($arg, $vocabulary);
    $term = array_shift($term);

    if (!$term) {
        $node = menu_get_object();
        if ($node && $node->type == 'productos') {
            $term = taxonomy_term_load($node->field_categor_a[LANGUAGE_NONE][0]['tid']);
        }
    }

    return $term;
}

function _custom_producto_get_items_filtro_linea($categoria_term_name, $type = 'linea') {
    return _custom_producto_get_categorias_by_another_category($categoria_term_name, $type);
}

function _custom_producto_get_categorias_fijas() {
    $categorias_fijas = array(
        'Lineas',
        'Ambientes',
        'Colores',
        'Usos',
        'Medidas',
    );
    return $categorias_fijas;
}

/**
 * 
 * @param type $term_name Taxonomy Name (Vocabulary Categoria) para armar las urls
 * @return array
 */
function _custom_producto_get_items_filtro_all($term_name) {
    $categorias_fijas = _custom_producto_get_categorias_fijas();
    $items = array();
    $term_name = pathauto_cleanstring($term_name);

    $items['lineas'] = l('Lineas', "productos/$term_name");
    $items['ambientes'] = l('Ambientes', "productos/$term_name/ambientes");
    $items['colores'] = l('Colores', "productos/$term_name/tonos");
    $items['usos'] = l('Usos', "productos/$term_name/usos");
    $items['medidas'] = l('Medidas', "productos/$term_name/medidas");

    return $items;
}

/**
 * Devuelve las taxonomies filtradas por otra taxonomia
 * @param type $term_name De la categoria a filtrar
 * @param type $output_result Es el tipo de resutado a devolver. Los valores validos son: Linea, Ambiente, Uso, Medida, Color
 * @param type $vocabulary Machine name del vocabuario del term_name
 * @return type
 */
function _custom_producto_get_categorias_by_another_category($term_name, $output_result, $vocabulary = 'categor_a') {
    static $terms;
    if (!isset($terms[$term_name][$vocabulary][$output_result])) {
        $term = _custom_producto_get_term_from_arg();
        /*
          SELECT taxonomy_term_data.*, taxonomy_index.*, field_revision_field_categor_a.*
          FROM taxonomy_term_data

          INNER JOIN taxonomy_index ON taxonomy_index.tid = taxonomy_term_data.tid
          INNER JOIN field_revision_field_categor_a ON field_revision_field_categor_a.entity_id = taxonomy_index.nid

          WHERE taxonomy_term_data.vid = 9 AND field_revision_field_categor_a.field_categor_a_tid = 172
          GROUP BY taxonomy_term_data.tid;
         *  */
        $query = db_select('taxonomy_term_data')
                ->fields('taxonomy_term_data', array())
                ->condition('field_revision_field_categor_a.field_categor_a_tid', $term->tid)
                ->groupBy('taxonomy_term_data.tid')
        ;
        $query->join('taxonomy_index', 'taxonomy_index', 'taxonomy_index.tid = taxonomy_term_data.tid');
        $query->join('field_revision_field_categor_a', 'field_revision_field_categor_a', 'field_revision_field_categor_a.entity_id = taxonomy_index.nid');
        $filter_propiedades_adicionales = false;
        switch (strtolower($output_result)) {
            case 'linea':
            case 'lineas':
                $output_result = 'linea';
                $o_vocabulary = taxonomy_vocabulary_machine_name_load($output_result);
                break;
            case 'color':
            case 'colores':
                $output_result = 'color';
                $o_vocabulary = taxonomy_vocabulary_machine_name_load($output_result);
                break;
            case 'tonos':
                $output_result = 'tono';
                $o_vocabulary = taxonomy_vocabulary_machine_name_load($output_result);
                break;
            case 'ambiente':
            case 'ambientes':
                $output_result = 'ambiente';
                $filter_propiedades_adicionales = true;
                break;
            case 'uso':
            case 'usos':
                $output_result = 'uso';
                $filter_propiedades_adicionales = true;
                break;
            case 'medida':
            case 'medidas':
                $output_result = 'medida';
                $filter_propiedades_adicionales = true;
                break;
        }
        if ($filter_propiedades_adicionales) {
        	$query->join('taxonomy_term_hierarchy', 'taxonomy_term_hierarchy', 'taxonomy_term_hierarchy.tid = taxonomy_term_data.tid', NULL);
        	$_term_parent = taxonomy_get_term_by_name($output_result, 'propiedades_adicionales');
        	$tid = key($_term_parent);
        	$o_vocabulary = taxonomy_vocabulary_machine_name_load('propiedades_adicionales');
        	$query->condition('taxonomy_term_hierarchy.parent', $tid);
        }
        if ($o_vocabulary) {
            $query->condition('taxonomy_term_data.vid', $o_vocabulary->vid);            
        }
        $result = $query->execute()->fetchAll();
        $terms[$term_name][$vocabulary][$output_result] = array();

        foreach ($result as $t) {
            $terms[$term_name][$vocabulary][$output_result][$t->tid] = taxonomy_term_load($t->tid);
        }
    }
    return $terms[$term_name][$vocabulary][$output_result];
}
