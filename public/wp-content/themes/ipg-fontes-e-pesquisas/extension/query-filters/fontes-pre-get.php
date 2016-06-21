<?php

add_filter('pre_get_posts', 'ipg_fontes_pre_get');
function ipg_fontes_pre_get($query) {
    if (!$query->is_main_query()) { return; }
    if (!is_post_type_archive('fontes')) { return; }

    $fontes_filters = ipg_get_fontes_filters();
    $tax_filters = $fontes_filters['tax'];
    $meta_filters = $fontes_filters['meta'];

    // TODO: Make this paginated
    $query->set('orderby', 'rand');
    $query->set('posts_per_page', -1);

    $query = ipg_modify_query($query, $tax_filters, $meta_filters);
    return $query;
}
