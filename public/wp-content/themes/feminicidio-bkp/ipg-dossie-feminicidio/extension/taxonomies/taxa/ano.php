<?php

function ios_tax_taxa_ano() {
    $labels = array(
        'name'              => _x( 'Ano', 'Type' ),
        'singular_name'     => _x( 'Ano', 'Type' ),
        'search_items'      => __( 'Buscar ano' ),
        'all_items'         => __( 'Todos os anos' ),
        'edit_item'         => __( 'Editar ano' ),
        'update_item'       => __( 'Alterar ano' ),
        'add_new_item'      => __( 'Add novo ano' ),
        'new_item_name'     => __( 'Novo ano' ),
        'menu_name'         => __( 'Ano' ),
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
        $args['rewrite'] = array('slug' => $type . '-taxa_anos');
        register_taxonomy('taxa_ano_' . $type, array($type), $args);
    }
}
add_action('init', 'ios_tax_taxa_ano');
