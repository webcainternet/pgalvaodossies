<?php

// ADD NEW COLUMN
function ipg_violencia_column_admin_head($columns) {
    $new = array();
    foreach($columns as $key => $title) {
      $new[$key] = $title;

      if ($key == 'title') {
        $new['_cf_order'] = 'Ordem';
        $new['_cf_not_hidden'] = 'Taxonomia/filtro';
      }
    }
    return $new;
}


// SHOW THE FEATURED VALUE
function ipg_violencia_column_admin_content($column_name, $post_ID) {
    if ($column_name == '_cf_order') {
        $order = get_post_meta($post_ID, '_cf_order', true);
        $order = (empty($order)) ? '0' : $order;
        echo '<p>' . $order . '</p>';
    } else {
        $not_hidden = get_post_meta($post_ID, '_cf_not_hidden', true);
        $not_hidden = (empty($not_hidden) || $not_hidden != '1') ? 'Não' : 'Sim';
        echo '<p>' . $not_hidden . '</p>';
    }
}

add_filter('manage_violencias_posts_columns', 'ipg_violencia_column_admin_head', 1);
add_action('manage_violencias_posts_custom_column', 'ipg_violencia_column_admin_content', 1, 2);
