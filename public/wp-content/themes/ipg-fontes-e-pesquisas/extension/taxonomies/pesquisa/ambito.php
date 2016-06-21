<?php
// Âmbito
function ipg_tax_context() {
    $labels = array(
        'name'              => _x( 'Âmbito', 'context' ),
        'singular_name'     => _x( 'Âmbito', 'context' ),
        'search_items'      => __( 'Buscar Âmbito' ),
        'all_items'         => __( 'Todos os Âmbitos' ),
        'edit_item'         => __( 'Editar Âmbito' ),
        'update_item'       => __( 'Alterar Âmbito' ),
        'add_new_item'      => __( 'Add novo Âmbito' ),
        'new_item_name'     => __( 'Novo Âmbito' ),
        'menu_name'         => __( 'Âmbito' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'ambito' ),
    );

    register_taxonomy( 'ambito', array( 'pesquisas' ), $args );
}
add_action( 'init', 'ipg_tax_context' );
