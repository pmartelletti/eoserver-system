<?php

global $theme_root;
$theme_root = base_path() . drupal_get_path('theme', 'elvyre');

/**
 * Implements template_preprocess_html().
 */
function elvyre_preprocess_html(&$vars) {
    $path = explode('/', drupal_get_path_alias($_GET['q']));
    foreach ($path as $p) {
        $vars['classes_array'][] = $p;
    }
}

function elvyre_breadcrumb($variables) {

    $breadcrumb = $variables['breadcrumb'];
    if (!empty($breadcrumb)) {

        $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

        $breadcrumb[] = drupal_get_title();
        $output .= '<ul class="crumbs"><li><span>You are here:</span></li> ' . implode('  /  ', $breadcrumb) . '</ul>';
        return $output;
    }
}

function elvyre_button($variables) {

    $element = $variables['element'];
    $element['#attributes']['type'] = 'submit';
    element_set_attributes($element, array('id', 'name', 'value'));

    $element['#attributes']['class'][] = 'wpcf7-submit default form-' . $element['#button_type'];
    if (!empty($element['#attributes']['disabled'])) {
        $element['#attributes']['class'][] = 'form-button-disabled';
    }

    return '<input' . drupal_attributes($element['#attributes']) . ' />';
}

function elvyre_preprocess_page(&$variables) {
    $main_menu = menu_tree_output(menu_tree_all_data(variable_get('menu_main_links_source', 'main-menu'), NULL, 3));
    // Custom wrapper for 1st menu level.
    $main_menu['#theme_wrappers'] = array('menu_tree__main_menu_primary');
    $variables['page']['main_menu'] = $main_menu;
    if (isset($variables['node'])) {
        $function = __FUNCTION__ . '_' . $variables['node']->type;
        if (function_exists($function)) {
            $function($variables);
        }
    }
}

function elvyre_preprocess_page_productos(&$variables) {
    $variables['theme_hook_suggestions'][] = 'page__node__' . $variables['node']->type;
    $variables['image_fondo'] = '';
    if (isset($variables['node']->field_imagenes_del_producto) && !empty($variables['node']->field_imagenes_del_producto)) {
        $variables['image_fondo'] = image_style_url('productos_imagen_fondo', $variables['node']->field_imagenes_del_producto[LANGUAGE_NONE][0]['uri']);
    }
}

function elvyre_preprocess_node(&$variables) {
    if (isset($variables['node'])) {
        $function = __FUNCTION__ . '_' . $variables['node']->type;
        if (function_exists($function)) {
            $function($variables);
        }
    }
}

function elvyre_preprocess_node_productos(&$variables) {
    $variables['page'] = false;
}

/**
 * Theme wrapper for 1st level of main menu
 */
function elvyre_menu_tree__main_menu_primary($variables) {
    return '<ul>' . $variables['tree'] . '</ul>';
}

/**
 * Theme wrapper for 2nd (and deeper) level of main menu
 */
function elvyre_menu_tree__main_menu($variables) {
    return '<ul>' . $variables['tree'] . '</ul>';
}

function elvyre_menu_link(array $variables) {

    unset($variables['element']['#attributes']['class']);
    $element = $variables['element'];
    $sub_menu = '';

    if ($variables['element']['#attributes']) {
        $sub_menu = '';
    }

    if ($element['#below']) {
        $sub_menu = drupal_render($element['#below']);
    }

    $output = l($element['#title'], $element['#href'], $element['#localized_options']);

    /*if (isset($variables['element']['#original_link']['options']['content']['image'])) {
        $file = file_load($variables['element']['#original_link']['options']['content']['image']);
        $image = theme('image_style', array('style_name' => 'menu', 'path' => $file->uri));
        $image = l($image, $element['#href'], array('html' => true));
        $output = $output . '<div class="image-menu image-menu-'. $variables['element']['#original_link']['mlid'] .'">' . $image . '</div>';
        $element['#attributes'][] = 'has-image';
    }*/

    if (strpos($output, "active") > 0) {
        $element['#attributes']['class'][] = "current-menu-item";
    }

    return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

function elvyre_css_alter(&$css) {

    // Sort CSS items, so that they appear in the correct order.
    // This is taken from drupal_get_css().
    uasort($css, 'drupal_sort_css_js');

    // The Print style sheets
    // I will populate this array with the print css (usually I have only one but just in case…)
    $print = array();

    // I will add some weight to the new $css array so every element keeps its position
    $weight = 0;

    foreach ($css as $name => $style) {

        // I leave untouched the conditional stylesheets
        // and put all the rest inside a 0 group
        if ($css[$name]['browsers']['!IE']) {
            $css[$name]['group'] = 0;
            $css[$name]['weight'] = ++$weight;
            $css[$name]['every_page'] = TRUE;
        }

        // I move all the print style sheets to a new array
        if ($css[$name]['media'] == 'print') {
            // remove and add to a new array
            $print[$name] = $css[$name];
            unset($css[$name]);
        }
    }

    // I merge the regular array and the print array
    $css = array_merge($css, $print);
}

function elvyre_form_contact_site_form_alter(&$form, &$form_state) {
    drupal_set_title(' ');
}

function elvyre_item_list($variables) {
    $items = $variables['items'];
    $title = $variables['title'];
    $type = $variables['type'];
    $attributes = $variables['attributes'];
    // Only output the list container and title, if there are any list items.
    // Check to see whether the block title exists before adding a header.
    // Empty headers are not semantic and present accessibility challenges.
    $output = '<div class="item-list">';
    if (isset($title) && $title !== '') {
        $output .= '<h3>' . $title . '</h3>';
    }

    if (!empty($items)) {
        $output .= "<$type" . drupal_attributes($attributes) . '>';
        $num_items = count($items);
        $i = 0;
        foreach ($items as $item) {
            $zebra = ($i % 2) ? 'odd' : 'even'; // added
            $attributes = array();
            $children = array();
            $data = '';
            $i++;
            if (is_array($item)) {
                foreach ($item as $key => $value) {
                    if ($key == 'data') {
                        $data = $value;
                    } elseif ($key == 'children') {
                        $children = $value;
                    } else {
                        $attributes[$key] = $value;
                    }
                }
            } else {
                $data = $item;
            }
            if (count($children) > 0) {
                // Render nested list.
                //$attributes['class'][] = 'childrens';
                $data .= theme_item_list(array('items' => $children, 'title' => NULL, 'type' => $type, 'attributes' => $attributes));
            }
            if ($i == 1) {
                $attributes['class'][] = 'first';
            }
            if ($i == $num_items) {
                $attributes['class'][] = 'last';
            }
            $attributes['class'][] = $zebra;
            $output .= '<li' . drupal_attributes($attributes) . '>' . $data . "</li>\n";
        }
        $output .= "</$type>";
    }
    $output .= '</div>';
    return $output;
}

function elvyre_theme() {
    return array(
        'contact_site_form' => array(
            'render element' => 'form',
            'template' => 'contact-site-form',
            'path' => drupal_get_path('theme', 'elvyre') . '/templates',
        ),
    );
}

function elvyre_preprocess_contact_site_form(&$variables) {
    //an example of setting up an extra variable, you can also put this directly in the template
    $variables['info'] = 'Please fill in the fields below to contact us';
    //this is the contents of the form
    $variables['contact'] = drupal_render_children($variables['form']);
}
