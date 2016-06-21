<?php

function ios_tax_taxa_regiao_estado() {
    $labels = array(
        'name'              => _x( 'Região/Estado', 'Type' ),
        'singular_name'     => _x( 'Região/Estado', 'Type' ),
        'search_items'      => __( 'Buscar região/estado' ),
        'all_items'         => __( 'Todos os região/estados' ),
        'edit_item'         => __( 'Editar região/estado' ),
        'update_item'       => __( 'Alterar região/estado' ),
        'add_new_item'      => __( 'Add novo região/estado' ),
        'new_item_name'     => __( 'Novo região/estado' ),
        'menu_name'         => __( 'Região/Estado' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true
    );

    $post_types = array(
        'taxa'
    );

    foreach ($post_types as $type) {
        $args['rewrite'] = array('slug' => $type . '-taxa_regiao_estados');
        register_taxonomy('taxa_regiao_estado_' . $type, array($type), $args);
    }
}
add_action('init', 'ios_tax_taxa_regiao_estado');
