<?php

function ipg_modify_query_with_txtq($post_types) {
    global $wp_query;

    if (!isset($_GET) || !array_key_exists('txtq', $_GET)) { return false; }

    $q = trim($_GET['txtq']);

    if (empty($q)) { return false; }

    $filters = false;
    if ($post_types == 'fontes') {
        $filters = ipg_get_fontes_filters();
    } elseif ($post_types == 'pesquisas') {
        $filters = ipg_get_pesquisas_filters();
    }

    $args = array(
        'post_type' => $post_types,
        's' => $q
    );

    if ($filters) {
        $tax_filters = $filters['tax'];
        $meta_filters = $filters['meta'];
        $tax_query = create_tax_query($tax_filters);
        $meta_query = create_meta_query($meta_filters);

        if ($tax_query) {
            $args['tax_query'] = $tax_query;
        }

        if ($meta_query) {
            $args['meta_query'] = $meta_query;
        }
    }

    $query_with_s = get_posts($args);
    $wp_query->post_count = $wp_query->post_count + count($query_with_s);
    $wp_query->posts = array_merge($wp_query->posts, $query_with_s);
}
