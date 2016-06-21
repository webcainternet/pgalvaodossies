<?php

add_filter('pre_get_posts', 'ipg_search_pre_get');
function ipg_search_pre_get($query) {
    if (!$query->is_main_query()) { return; }
    if (!is_search()) { return; }

    $post_types = array('pesquisas', 'fontes', 'violencias');

    if (isset($_GET['tipos'])) {
        $types = $_GET['tipos'];

        $post_types = array();

        if (in_array('pesquisas', $types)) {
            array_push($post_types, 'pesquisas');
        }

        if (in_array('fontes', $types)) {
            array_push($post_types, 'fontes');
        }

        if (in_array('violencias', $types)) {
            array_push($post_types, 'violencias');
        }
    }

    $query->set('post_type', $post_types);
    return $query;
}
