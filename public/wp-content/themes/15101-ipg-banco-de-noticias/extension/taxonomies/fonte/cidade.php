<?php
// Ano de correspondência da inscricao
function ipg_city() {
    $labels = array(
        'name'              => _x( 'Cidade e estado', 'City and state' ),
        'singular_name'     => _x( 'Cidade e estado', 'City and state' ),
        'search_items'      => __( 'Buscar Cidade e estado' ),
        'all_items'         => __( 'Todos as Cidades e estados' ),
        'edit_item'         => __( 'Editar Cidade ou Estados' ),
        'update_item'       => __( 'Alterar Cidade ou estado' ),
        'add_new_item'      => __( 'Add nova Cidade ou estado' ),
        'new_item_name'     => __( 'Nova Cidade ou estado' ),
        'menu_name'         => __( 'Cidade e estado' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'cidade' ),
    );

    register_taxonomy( 'cidade', array( 'fontes' ), $args );
}
add_action( 'init', 'ipg_city' );
