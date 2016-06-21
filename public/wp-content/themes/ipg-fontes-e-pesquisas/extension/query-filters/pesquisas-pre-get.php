<?php

add_filter('pre_get_posts', 'ipg_pesquisas_pre_get');
function ipg_pesquisas_pre_get($query) {
    if (!$query->is_main_query()) { return; }
    if (!is_post_type_archive('pesquisas')) { return; }

    $filters = ipg_get_pesquisas_filters();
    $tax_filters = $filters['tax'];
    $meta_filters = $filters['meta'];

    $query = ipg_modify_query($query, $tax_filters, $meta_filters);
    return $query;
}
