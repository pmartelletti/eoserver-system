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

function _custom_producto_get_items_filtro_linea($categoria_term_name) {
    return _custom_producto_get_categorias_by_another_category($categoria_term_name, 'linea');
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
    $items['ambientes'] = array('data' => '<a href="#">Ambientes</a>', 'children' => array());
    $ambientes = _custom_producto_get_categorias_by_another_category($term_name, 'ambiente');
    foreach ($ambientes as $ambiente) {
        $name = explode(':', $ambiente->name);
        if (isset($name[1])) {
            $url = pathauto_cleanstring($ambiente->name);
            $items['ambientes']['children'][] = l($name[1], "productos/$term_name/ambiente/$url");
        }
    }
    $items['colores'] = array('data' => '<a href="#">Colores</a>', 'children' => array());
    $colores = _custom_producto_get_categorias_by_another_category($term_name, 'color');
    foreach ($colores as $color) {
        $name = $color->name;
        if (isset($name)) {
            $url = pathauto_cleanstring($name);
            $items['colores']['children'][] = l($name, "productos/$term_name/color/$url");
        }
    }
    $items['usos'] = array('data' => '<a href="#">Usos</a>', 'children' => array());
    /* $usos = _custom_producto_get_categorias_by_another_category($term_name, 'uso');
      foreach ($usos as $uso) {
      $name = $uso->name;
      if (isset($name)) {
      $url = pathauto_cleanstring($name);
      $items['usos']['children'][] = l($name, "productos/$term_name/uso/$url");
      }
      } */
    $items['medidas'] = array('data' => '<a href="#">Medidas</a>', 'children' => array());
    $medidas = _custom_producto_get_categorias_by_another_category($term_name, 'medida');
    foreach ($medidas as $medida) {
        $name = explode(':', $medida->name);
        if (isset($name[1])) {
            $url = pathauto_cleanstring($medida->name);
            $items['medidas']['children'][] = l($name[1], "productos/$term_name/medida/$url");
        }
    }

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

        switch (strtolower($output_result)) {
            case 'linea':
            case 'color':
                $o_vocabulary = taxonomy_vocabulary_machine_name_load($output_result);
                break;
            case 'ambiente':
            case 'uso':
            case 'medida':
                $query->where('taxonomy_term_data.name LIKE :value', array(':value' => substr($output_result, 0, 6) . '%'));
                $o_vocabulary = taxonomy_vocabulary_machine_name_load('propiedades_adicionales');
                break;
        }
        $query->condition('taxonomy_term_data.vid', $o_vocabulary->vid);
        $result = $query->execute()->fetchAll();
        $terms[$term_name][$vocabulary][$output_result] = array();

        foreach ($result as $t) {
            $terms[$term_name][$vocabulary][$output_result][$t->tid] = $t;
        }
    }
    return $terms[$term_name][$vocabulary][$output_result];
}
