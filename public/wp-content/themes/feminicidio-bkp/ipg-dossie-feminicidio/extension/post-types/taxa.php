<?php

function ipg_cpt_taxa() {
  $labels = array(
    'name'               => 'Taxas',
    'singular_name'      => 'Taxa',
    'menu_name'          => 'Taxas',
    'name_admin_bar'     => 'Taxa',
    'add_new'            => 'Adicionar novo',
    'add_new_item'       => 'Adicionar novo item',
    'new_item'           => 'Novo item',
    'edit_item'          => 'Editar item',
    'view_item'          => 'Ver item',
    'all_items'          => 'Todos',
    'search_items'       => 'Buscar',
    'parent_item_colon'  => 'Item mãe',
    'not_found'          => 'Não encontrado',
    'not_found_in_trash' => 'Não encontrado'
  );

  $supports = array('title');

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => 'taxas'),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'taxonomies' => array(),
    'supports'           => $supports
  );

  register_post_type('taxa', $args);
}
add_action('init', 'ipg_cpt_taxa');
