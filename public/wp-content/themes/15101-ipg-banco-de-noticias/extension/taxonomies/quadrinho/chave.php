<?php

function ipg_tx_quadrinho_key() {
    $labels = array(
        'name'              => _x( 'Chave', 'Key' ),
        'singular_name'     => _x( 'Chave', 'Key' ),
        'search_items'      => __( 'Buscar Chave' ),
        'all_items'         => __( 'Todas as chaves' ),
        'edit_item'         => __( 'Editar Chaves' ),
        'update_item'       => __( 'Alterar chave' ),
        'add_new_item'      => __( 'Add nova chave' ),
        'new_item_name'     => __( 'Nova chave' ),
        'menu_name'         => __( 'Chave' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'chave' ),
    );

    register_taxonomy( 'chave', array( 'quadrinhos' ), $args );
}
add_action( 'init', 'ipg_tx_quadrinho_key' );
