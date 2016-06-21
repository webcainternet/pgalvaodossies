<?php

function ios_tax_servico_existente_tipo() {
    $labels = array(
        'name'              => _x( 'Tipos', 'Type' ),
        'singular_name'     => _x( 'Tipo', 'Type' ),
        'search_items'      => __( 'Buscar tipo' ),
        'all_items'         => __( 'Todos os tipos' ),
        'edit_item'         => __( 'Editar tipo' ),
        'update_item'       => __( 'Alterar tipo' ),
        'add_new_item'      => __( 'Add novo tipo' ),
        'new_item_name'     => __( 'Novo tipo' ),
        'menu_name'         => __( 'Tipo' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true
    );

    $post_types = array(
        'servico_existente'
    );

    foreach ($post_types as $type) {
        $args['rewrite'] = array('slug' => $type . '-_tipos');
        register_taxonomy('tipo_' . $type, array($type), $args);
    }
}
add_action('init', 'ios_tax_servico_existente_tipo');
