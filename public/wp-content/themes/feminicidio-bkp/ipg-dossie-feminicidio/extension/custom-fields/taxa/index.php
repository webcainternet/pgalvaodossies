<?php

function ipg_cf_taxas_prefix() {
    return '_cf_taxa_';
}

function ipg_cf_taxas_fields() {
    return array(
        'taxa' => array(
            'type' => 'number',
            'default' => '',
            'name' => 'Taxa'
        )
    );
}

// text
function ipg_cf_taxas_view(){
    global $post, $meta_boxes;
    $prefix = ipg_cf_taxas_prefix();
    $meta = qdi_get_meta_values();
    $fields = ipg_cf_taxas_fields();
    include(CFPATH . '/shared/_form.html.php');
}

function ipg_cf_taxas_add() {
    add_meta_box(
        'ipg_cf_taxas_view',
        'Dados das taxas',
        'ipg_cf_taxas_view',
        'taxa',
        'normal',
        'high'
    );
}

function ipg_cf_taxas_save(){
    global $post;
    $prefix = ipg_cf_taxas_prefix();
    $fields = ipg_cf_taxas_fields();
    qdi_save_meta_fields($prefix, $fields);
}

add_action('add_meta_boxes', 'ipg_cf_taxas_add');
add_action('save_post', 'ipg_cf_taxas_save');
