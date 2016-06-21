<?php
// Violência
function ipg_tax_violence() {
    $labels = array(
        'name'              => _x( 'Violência', 'context' ),
        'singular_name'     => _x( 'Violência', 'context' ),
        'search_items'      => __( 'Buscar Violência' ),
        'all_items'         => __( 'Todos os Âmbitos' ),
        'edit_item'         => __( 'Editar Violência' ),
        'update_item'       => __( 'Alterar Violência' ),
        'add_new_item'      => __( 'Add novo Violência' ),
        'new_item_name'     => __( 'Novo Violência' ),
        'menu_name'         => __( 'Violência' )
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'violencia' )
    );

    register_taxonomy( 'violencia', array( 'pesquisas', 'fontes' ), $args );
}
add_action( 'init', 'ipg_tax_violence' );
