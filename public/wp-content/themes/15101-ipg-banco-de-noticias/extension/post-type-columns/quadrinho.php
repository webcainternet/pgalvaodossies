<?php

// ADD NEW COLUMN
function ipg_quadrinho_column_admin_head($columns) {
    $new = array();
    foreach($columns as $key => $title) {
      $new[$key] = $title;
      if ($key == 'title') {
        $new['thumbnail'] = 'Thumbnail';
      }
    }
    return $new;
}


// SHOW THE FEATURED VALUE
function ipg_quadrinho_column_admin_content($column_name, $post_ID) {
    if ($column_name == 'thumbnail') {
        the_post_thumbnail(array(120, 120));
    }
}

add_filter('manage_quadrinhos_posts_columns', 'ipg_quadrinho_column_admin_head', 1);
add_action('manage_quadrinhos_posts_custom_column', 'ipg_quadrinho_column_admin_content', 1, 2);
