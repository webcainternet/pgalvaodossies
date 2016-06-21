<?php

function ipg_cf_servico_existente_prefix() {
    return '_cf_servico_existente_';
}

function ipg_cf_servico_existente_fields() {
    return array(
        'lat' => array(
            'type' => 'number',
            'default' => '',
            'name' => 'Latitude'
        ),
        'lng' => array(
            'type' => 'number',
            'default' => '',
            'name' => 'Longitude'
        ),
        'address' => array(
            'type' => 'textarea',
            'default' => '',
            'name' => 'Endereço'
        ),
        'radius' => array(
            'type' => 'number',
            'default' => '',
            'name' => 'Raio de atuação (em metros)'
        ),
        'population' => array(
            'type' => 'number',
            'default' => '',
            'name' => 'População da região (em pessoas)'
        ),
        'limit' => array(
            'type' => 'number',
            'default' => '',
            'name' => 'Limite de pessoas atendidas'
        )
    );
}

// text
function ipg_cf_servico_existente_view(){
    global $post, $meta_boxes;
    $prefix = ipg_cf_servico_existente_prefix();
    $meta = qdi_get_meta_values();
    $fields = ipg_cf_servico_existente_fields();
    include(CFPATH . '/shared/_form.html.php');
}

function ipg_cf_servico_existente_add() {
    add_meta_box(
        'ipg_cf_servico_existente_view',
        'Dados do Serviço',
        'ipg_cf_servico_existente_view',
        'servico_existente',
        'normal',
        'high'
    );
}

function ipg_cf_servico_existente_save(){
    global $post;
    $prefix = ipg_cf_servico_existente_prefix();
    $fields = ipg_cf_servico_existente_fields();
    qdi_save_meta_fields($prefix, $fields);
}

add_action('add_meta_boxes', 'ipg_cf_servico_existente_add');
add_action('save_post', 'ipg_cf_servico_existente_save');
