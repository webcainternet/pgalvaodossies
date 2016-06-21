<?php

function ipg_cpt_violencia() {
  $labels = array(
    'name'               => 'Violencias',
    'singular_name'      => 'Violencia',
    'menu_name'          => 'Violencias',
    'name_admin_bar'     => 'Violencia',
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

  $supports = array('title', 'editor', 'excerpt', 'thumbnail');

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => 'violencias'),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'taxonomies' => array('post_tag'),
    'supports'           => $supports
  );

  register_post_type('violencias', $args);
}
add_action('init', 'ipg_cpt_violencia');
