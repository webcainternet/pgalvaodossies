<?php

function ipg_cpt_fonte() {
  $labels = array(
    'name'               => 'Fontes',
    'singular_name'      => 'Fonte',
    'menu_name'          => 'Fontes',
    'name_admin_bar'     => 'Fonte',
    'add_new'            => 'Adicionar nova',
    'add_new_item'       => 'Adicionar nova Fonte',
    'new_item'           => 'Nova fonte',
    'edit_item'          => 'Editar fonte',
    'view_item'          => 'Ver fonte',
    'all_items'          => 'Todas',
    'search_items'       => 'Buscar',
    'parent_item_colon'  => 'Fonte mãe',
    'not_found'          => 'Não encontrado',
    'not_found_in_trash' => 'Não encontrado'
  );

  $supports = array('title', 'thumbnail');

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => 'fontes'),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'taxonomies' => array('post_tag'),
    'supports'           => $supports
  );

  register_post_type('fontes', $args);
}
add_action('init', 'ipg_cpt_fonte');
