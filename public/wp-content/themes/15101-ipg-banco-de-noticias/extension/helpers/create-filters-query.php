<?php

function create_order_args($query) {
    if(!isset($_GET) || !array_key_exists('ordem', $_GET)) { return $query; }

    switch ($_GET['ordem']) {
        case 'alfabetica':
            $query->set('orderby', 'title');
            $query->set('order', 'ASC');
            break;
        case 'z-a':
            $query->set('orderby', 'title');
            $query->set('order', 'DESC');
            break;
        case 'ano':
            $query->set('orderby', 'ano');
            $query->set('order', 'DESC');
            break;
        default:
            break;
    }

    return $query;
}

function create_tax_query($tax_filters) {
    $tax_queries = array();
    $tax_query = false;

    foreach ($tax_filters as $filter => $vals) {
        if (!isset($_GET) || !array_key_exists($filter, $_GET)) { continue; }
        if ($_GET[$filter] == '-') { continue; }
        $tax_query = array(
            'taxonomy' => $vals['key'],
            'field'    => 'slug',
            'terms'    => $_GET[$filter]
        );
        array_push($tax_queries, $tax_query);
    }

    $tax_queries_count = count($tax_queries);
    if ($tax_queries_count > 1) {
        $tax_query = array(
            'relation' => 'AND',
            $tax_queries
        );
    } elseif ($tax_queries_count > 0) {
        $tax_query = array($tax_queries);
    }

    return $tax_query;
}

function create_meta_query($meta_filters) {
    $meta_queries = array();

    foreach ($meta_filters as $filter => $vals) {
        if (!isset($_GET) || !array_key_exists($filter, $_GET)) { continue; }
        if ($_GET[$filter] == '-') { continue; }
        $meta_query = array(
            'key' => $vals['meta_key'],
            'value' => $_GET[$filter],
            'compare' => 'LIKE'
        );
        array_push($meta_queries, $meta_query);
    }

    if (count($meta_queries) < 1) { $meta_queries = false; }

    return $meta_queries;
}
