<?php

function ipg_get_fontes_filters() {
    $tax_filters = array(
        'ici' => array(
            'name' => 'Estados',
            'key' => 'cidade'
        ),
        'ies' => array(
            'name' => 'Estados',
            'key' => 'cidade'
        )
    );

    $meta_filters = array(
      'ivi' => array(
        'name' => 'Sobre o que fala',
        'key' => 'violencias',
        'meta_key' => '_cf_about'
      )
    );

    return array(
        'tax' => $tax_filters,
        'meta' => $meta_filters
    );
}
