<?php

function wp_ajax_return_city() {
    $state_slug = $_REQUEST['state_slug'];

    $term_id = get_term_by('slug', $state_slug, 'cidade');

    $terms = get_terms('cidade', array(
        'hide_empty' => true,
        'parent' => (int) $term_id->term_id
    ));

    $items = array();

    foreach ($terms as $term) {
        $item = array(
           'name' => $term->name,
           'slug' => $term->slug
        );

        array_push($items, $item);
    }
    echo json_encode($items);
    die;
}
