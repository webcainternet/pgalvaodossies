<?php
// Instituição / Orgão
function ipg_institution() {
    $labels = array(
        'name'              => _x( 'Instituição / Orgão', 'Institution / Organ' ),
        'singular_name'     => _x( 'Instituição / Orgão', 'Institution / Organ' ),
        'search_items'      => __( 'Buscar Instituição' ),
        'all_items'         => __( 'Todos as Instituições' ),
        'edit_item'         => __( 'Editar Instituição' ),
        'update_item'       => __( 'Alterar Instituição' ),
        'add_new_item'      => __( 'Add nova Instituição' ),
        'new_item_name'     => __( 'Nova Instituição' ),
        'menu_name'         => __( 'Instituição / Orgão' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'instituicao' ),
    );

    register_taxonomy( 'instituicao', array( 'pesquisas' ), $args );
}
add_action( 'init', 'ipg_institution' );
