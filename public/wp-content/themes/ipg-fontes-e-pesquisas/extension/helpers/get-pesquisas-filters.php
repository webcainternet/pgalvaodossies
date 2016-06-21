<?php

function ipg_get_pesquisas_filters() {
    $tax_filters = array(
        'iam' => array(
            'name' => 'Âmbito',
            'key' => 'ambito'
        ),
        'ian' => array(
            'name' => 'Ano',
            'key' => 'ano'
        ),
        'iis' => array(
            'name' => 'Órgão/instituição',
            'key' => 'instituicao'
        )
    );

    $meta_filters = array(
        'ivi' => array(
            'name' => 'Tipos de violência',
            'key' => 'violencias',
            'meta_key' => '_cf_tipos'
        )
    );

    return array(
        'tax' => $tax_filters,
        'meta' => $meta_filters
    );
}
