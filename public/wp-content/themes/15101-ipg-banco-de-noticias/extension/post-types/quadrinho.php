<?php

function ipg_cpt_quadrinho() {
  $labels = array(
    'name'               => 'Quadrinhos',
    'singular_name'      => 'Quadrinho',
    'menu_name'          => 'Quadrinhos',
    'name_admin_bar'     => 'Quadrinho',
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

  $supports = array('title', 'thumbnail');

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => 'quadrinhos'),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => $supports
  );

  register_post_type('quadrinhos', $args);
}
add_action('init', 'ipg_cpt_quadrinho');
