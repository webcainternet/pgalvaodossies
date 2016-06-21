<?php
// Ano
function ipg_year() {
    $labels = array(
        'name'              => _x( 'Anos', 'Year' ),
        'singular_name'     => _x( 'Anos', 'Year' ),
        'search_items'      => __( 'Buscar Ano' ),
        'all_items'         => __( 'Todos os Anos' ),
        'edit_item'         => __( 'Editar Ano' ),
        'update_item'       => __( 'Alterar Ano' ),
        'add_new_item'      => __( 'Add novo Ano' ),
        'new_item_name'     => __( 'Novo Ano' ),
        'menu_name'         => __( 'Ano' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'ano' ),
    );

    register_taxonomy( 'ano', array( 'pesquisas' ), $args );
}
add_action( 'init', 'ipg_year' );
