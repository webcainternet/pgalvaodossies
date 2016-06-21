<?php

function quadrinhos_parser($args) {
    $ids = array();
    $thumbs = array();
    $t_query = new WP_Query($args);

    if ($t_query->have_posts()) {
      while ($t_query->have_posts()) {
        $t_query->the_post();

        array_push($ids, get_the_ID());

        $thumb_id = get_post_thumbnail_id();
        $thumb_src = wp_get_attachment_image_src($thumb_id, 'quad_single');

        array_push($thumbs, array(
          'alt' => get_the_title(),
          'src' => $thumb_src[0]
        ));
      }
    }
    wp_reset_query();
    wp_reset_postdata();

    return array(
        'ids' => $ids,
        'thumbs' => $thumbs
    );
}
